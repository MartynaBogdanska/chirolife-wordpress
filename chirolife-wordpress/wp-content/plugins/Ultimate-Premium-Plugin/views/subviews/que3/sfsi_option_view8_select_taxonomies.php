<?php
  $allTaxonomies = get_taxonomies(array('public'=>true,'show_ui'=>true),'objects','and');
  $tcount        = count($allTaxonomies);

  $arrSfsi_plus_taxonomies_for_icons = (isset($option8['sfsi_plus_taxonomies_for_icons'])) ? unserialize($option8['sfsi_plus_taxonomies_for_icons']) : array();
  $arrSfsi_plus_taxonomies_for_icons = is_array($arrSfsi_plus_taxonomies_for_icons) ? $arrSfsi_plus_taxonomies_for_icons: array();
  $scount        = count($arrSfsi_plus_taxonomies_for_icons);
?>

<li>
  <div class="options sfsi_plus_choose_post_types_section">                     
                                  
        <div class="sfsi_plus_choose_post_type_wrap">
                                  
          <label><p><?php _e("Do you also want to show the icons on taxonomy pages (e.g. category pages)? Select all where you want them to show:", SFSI_PLUS_DOMAIN); ?></p></label> 
            <select multiple="multiple" name="sfsi_plus_taxonomies_for_icons" id="sfsi_plus_taxonomies_for_icons" style="min-width: 327px;margin-top: 10px;">
                        
              <option value=""><?php _e("------------- Choose Taxonomies -------------", SFSI_PLUS_DOMAIN); ?></option>

                  <?php if($tcount>0) {

                      foreach ($allTaxonomies as $taxonomy) { 

                            $selected_box = ($scount>0 && in_array( $taxonomy->name, $arrSfsi_plus_taxonomies_for_icons)) ? 'selected="selected"' : '';
                        ?>
                        <option <?php echo $selected_box; ?> value="<?php echo $taxonomy->name;?>"><?php _e(ucfirst($taxonomy->label),SFSI_PLUS_DOMAIN); ?></option>  
                      <?php }
                 } ?> 

            </select>
                                
           <div class="sfsi_ctrl_instruct cposttype"><?php _e("Please hold CTRL key to select multiple taxonomies.", SFSI_PLUS_DOMAIN); ?></div>

        </div>
  </div>
</li>