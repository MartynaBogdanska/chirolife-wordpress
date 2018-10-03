      <ul class="sfsiplus_icn_listing8 sfsi_plus_closerli sfsi_exclude_ul <?php echo $_inclusionSectionClass; ?>">

    	<li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_home" <?php echo ($option8['sfsi_plus_include_home']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on homepage', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_page" <?php echo ($option8['sfsi_plus_include_page']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on other internal pages (not homepage, ...)', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>

        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_post" <?php echo ($option8['sfsi_plus_include_post']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on single posts pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_tag" <?php echo ($option8['sfsi_plus_include_tag']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on tag pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_category" <?php echo ($option8['sfsi_plus_include_category']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on category pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_date_archive" <?php echo ($option8['sfsi_plus_include_date_archive']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on date based archives pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_author_archive" <?php echo ($option8['sfsi_plus_include_author_archive']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on author archives pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <li class="">
			<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_include_search" <?php echo ($option8['sfsi_plus_include_search']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on search results pages', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
		</li>
        
        <!-- Exclude rules for Post Types & Taxonomies  STARTS  here -->
        	<?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_include_postTypes_taxonomies.php'); ?>
        <!-- Exclude rules for Post Types & Taxonomies  CLOSES  here -->

        <li class="">
			<div class="radio_section tb_4_ck sfsi_plus_include_url_checkSec">
            	<input name="sfsi_plus_include_url" <?php echo ($option8['sfsi_plus_include_url']=='yes') ?  'checked="true"' : '';?>  type="checkbox" value="yes" class="styled"  />
            </div>
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show icons on urls which contain at least one of the following strings:', SFSI_PLUS_DOMAIN ); ?>
                    </span
				></p>
			</div>
            <div class="sfsi_plus_keywords_container includecontainter" style="display:<?php echo ($option8['sfsi_plus_include_url']=='yes') ?  'block' : 'none';?>">
            	
            	<?php
					
					if(isset($option8['sfsi_plus_include_urlKeywords']) && !empty($option8['sfsi_plus_include_urlKeywords']) && is_array($option8['sfsi_plus_include_urlKeywords']))
					{
						$count = count($option8['sfsi_plus_include_urlKeywords']);
						for($i = 0; $i < $count; $i++)
						{
							$serial = $i+1;
							echo '<fieldset>
								<label>String '.$serial.':</label>
								<input type="text" name="sfsi_plus_include_urlKeywords[]" value="'.sanitize_text_field($option8['sfsi_plus_include_urlKeywords'][$i]).'" />
								<a href="javascript:" class="sfsi_plus_include_deleteKeywordField">Delete</a>
							</fieldset>';
						}
					}
					else
					{
						$count = 1; ?>
	                    <fieldset>
	                        <label>String 1:</label>
	                        <input type="text" name="sfsi_plus_include_urlKeywords[]" value="" />
	                        <!--<a href="javascript:" class="sfsi_plus_deleteKeywordField">Delete</a>-->
	                    </fieldset>

                <?php } ?>

            </div>
            
            <a href="javascript:" class="sfsi_plus_include_addAnotherFiled" data-count="<?php echo $count; ?>"
            	style="display:<?php echo ($option8['sfsi_plus_include_url']=='yes') ?  'block' : 'none';?>">
            	Add another one
            </a>
		</li>
        
    </ul>