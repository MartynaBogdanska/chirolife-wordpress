<?php

global $wpdb;
				
define('SFSI_PREMIUM_JOB_QUEUE_TABLE',$wpdb->prefix.'sfsi_jobqueue');

if (!class_exists('sfsiJobQueue')):

	class sfsiJobQueue{

		protected static $instance = null;
		
		public function _construct(){
			
		}

		public static function getInstance(){

	        if (!isset(static::$instance)) {
	            static::$instance = new static;
	        }

	        return static::$instance;
    	}

		public function install_job_queue(){

			global $wpdb;
		    
		    $charset_collate = $wpdb->get_charset_collate();

			$sql = 'SHOW TABLES LIKE "'.SFSI_PREMIUM_JOB_QUEUE_TABLE.'"';

			if($wpdb->get_var($sql) != SFSI_PREMIUM_JOB_QUEUE_TABLE):

			    $create_table_query = "CREATE TABLE ".SFSI_PREMIUM_JOB_QUEUE_TABLE." (
			              `id` 		bigint(20) AUTO_INCREMENT NOT NULL,
			              `jobtype` tinyint(4) NOT NULL,
			              `urls` 	longtext   NOT NULL,
			              `status`  tinyint(4) NOT NULL,
			              `createdtimestamp` varchar(20) NOT NULL,
			              PRIMARY KEY  (id)
			            ) ".$charset_collate." ENGINE=MyISAM;";
			    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			    dbDelta( $create_table_query );

			endif;

			$this->indexing();
		}

		public function indexing(){

			global $wpdb;

			$sql = 'SHOW TABLES LIKE "'.SFSI_PREMIUM_JOB_QUEUE_TABLE.'"';

			if($wpdb->get_var($sql) == SFSI_PREMIUM_JOB_QUEUE_TABLE):
				
				$jobQueueInstalled = get_option('sfsi_premium_job_queue_installed',false);

				if(false == $jobQueueInstalled){
					update_option('sfsi_premium_job_queue_installed',true);
				}

				$jobQueueIndexingDone = get_option('sfsi_premium_job_queue_indexing',false);

				if(false == $jobQueueIndexingDone):

					$sqlInd = 'SHOW INDEX FROM '.SFSI_PREMIUM_JOB_QUEUE_TABLE;

					$indexes = $wpdb->get_results($sqlInd);

					$addIndexForJobType = true;
					$addIndexForUrls    = true;
					$addIndexForStatus  = true;

					$resultAddIndexForJobType = false;
					$resultAddIndexForUrls    = false;
					$resultAddIndexForStatus  = false;


					if(isset($indexes) && !empty($indexes)){

						foreach ($indexes as $key => $value) {
							
							if('jobtype' == $value->Column_name){
								$addIndexForJobType = false;
								$resultAddIndexForJobType = true;
							}
							else if('urls' == $value->Column_name){
								$addIndexForUrls = false;
								$resultAddIndexForUrls = true;
							}
							else if('status' == $value->Column_name){
								$addIndexForStatus = false;
								$resultAddIndexForStatus = true;
							}						
						}
					}

					if(false != $addIndexForJobType){
						$resultAddIndexForJobType = $wpdb->query("ALTER TABLE ".SFSI_PREMIUM_JOB_QUEUE_TABLE." ADD INDEX (jobtype)");
					}

					if(false != $addIndexForUrls){
						$resultAddIndexForUrls = $wpdb->query("ALTER TABLE ".SFSI_PREMIUM_JOB_QUEUE_TABLE." ADD FULLTEXT (urls)");			
					}

					if(false != $addIndexForStatus){
						$resultAddIndexForStatus = $wpdb->query("ALTER TABLE ".SFSI_PREMIUM_JOB_QUEUE_TABLE." ADD INDEX (status)");
					}				


					if(false != ($resultAddIndexForJobType && $resultAddIndexForUrls && $resultAddIndexForStatus)){
						update_option('sfsi_premium_job_queue_indexing',true);
					}

				endif;

			endif;
		}

		public function uninstall_job_queue(){
			
			global $wpdb;
			
			$table_name = SFSI_PREMIUM_JOB_QUEUE_TABLE;			
			
			$isDeleted = $wpdb->query( "DROP TABLE IF EXISTS $table_name" );

			if(false != $isDeleted){
				delete_option('sfsi_premium_job_queue_installed');
				delete_option('sfsi_premium_job_queue_indexing');				
			}
		}

		public function add_single_job($jobType,$jsonUrls){
			
			$isJobAdded = false;

			if(isset($jobType) && !empty($jobType) && isset($jsonUrls) && !empty($jsonUrls)){

				global $wpdb;
			
				$srhQuery = "SELECT id FROM ".SFSI_PREMIUM_JOB_QUEUE_TABLE." WHERE jobtype = '{$jobType}' AND JSON_CONTAINS(urls,'{$jsonUrls}')";

				$job = $wpdb->get_var($srhQuery);

				if(false == $job){

					$timestamp = time();

					$insert = $wpdb->query($wpdb->prepare("INSERT INTO ".SFSI_PREMIUM_JOB_QUEUE_TABLE." (`jobtype`,`urls`,`status`,`createdtimestamp`) VALUES (%s, %s, %d, %s)", $jobType, $jsonUrls,0,$timestamp));

					if(false != $insert){
						return $wpdb->insert_id;
					}
				}
			}

			return $isJobAdded;
		}

		public function add_multiple_jobs($jobType,$arrAllUrls){

			if(isset($jobType) && !empty($jobType) && isset($arrAllUrls) && !empty($arrAllUrls) && is_array($arrAllUrls)){

				foreach ($arrAllUrls as $key => $arrUrls):

					if(is_array($arrUrls)){
						$this->add_single_job($jobType,json_encode($arrUrls));				
					}

				endforeach;
			}

		}

		public function get_pending_jobs(){

			$pendingJobs = false;

			global $wpdb;
			
			$pendingJobs= $wpdb->get_results("SELECT * FROM ".SFSI_PREMIUM_JOB_QUEUE_TABLE." WHERE status =0 ORDER BY id ASC");

			$pendingJobs = (isset($pendingJobs) && !empty($pendingJobs)) ? $pendingJobs : false;

			return $pendingJobs;
		}

		public function is_job_running($jobId){
			
			$isJobRunning = false;

			if(isset($jobId) && !empty($jobId)){
			
				global $wpdb;

				$job = $wpdb->get_row("SELECT * FROM ".SFSI_PREMIUM_JOB_QUEUE_TABLE." WHERE status = 1 AND id = {$jobId}");

				if(isset($job) && !empty($job)){
					$isJobRunning = true;		
				}
			}

			return $isJobRunning;
		}

		public function job_start($jobId){
			
			$isStarted = false;

			if(isset($jobId) && !empty($jobId)){
			
				if( false == $this->is_job_running($jobId) ){

					global $wpdb;
					
					$isStarted = $wpdb->query( $wpdb->prepare( "UPDATE ".SFSI_PREMIUM_JOB_QUEUE_TABLE." SET status = '%d'  WHERE id = '%d'", 1, $jobId ) );

					if(false != $isStarted){
						$isStarted = true;
					}

				}

			}

			return $isStarted;
		}

		public function remove_finished_job($jobId){
			
			$isRemoved = false;

			if(isset($jobId) && !empty($jobId)){

				global $wpdb;
				
				 $tableName = $wpdb->prefix.'sfsi_jobqueue';

				$isRemoved = $wpdb->delete( $tableName,
			                    array( 'id' => $jobId),
			                    array( '%d') );
				
				if(false != $isRemoved){
					$isRemoved = true;
				}		
			}

			return $isRemoved;
		}

		// Remove unfinished jobs which was started not completed due to some error, check & delete jobs after specific time (job duration time in which job was supposed to finish but not finished yet)//
		public function remove_unfinished_jobs($interval=86400){
			
			global $wpdb;
				
			$tableName = $wpdb->prefix.'sfsi_jobqueue';

			$diff = time()-$interval;

			$isRemoved = $wpdb->query( 
			
			$wpdb->prepare("DELETE FROM $tableName WHERE 
				jobtype = %d AND 
				status = %d AND 
				createdtimestamp <= %s",
				1,
				1,
				 $diff)
			);
		}
	}

endif;
?>