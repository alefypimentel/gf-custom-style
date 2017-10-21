<?php

// Include Gravity Forms
if (!class_exists('RGForms'))
  @include_once(WP_PLUGIN_DIR . '/gravityforms/gravityforms.php');
if (!class_exists('RGFormsModel'))
  @include_once(WP_PLUGIN_DIR . '/gravityforms/forms_model.php');
if (!class_exists('GFCommon'))
  @include_once(WP_PLUGIN_DIR . '/gravityforms/common.php');

@include_once "gf-custom-class.php";

add_action('init',  array('GFCustomStyle', 'init'));
add_action('admin_notices', array('GFCustomStyle', 'admin_warnings'));

if (!class_exists('GFCustomStyle')) {

  class GFCustomStyle {

    public static function init() {
      add_action('gform_editor_js', array('GFCustomStyle', 'render_editor_js'));
    }

    public static function admin_warnings() {
      return GFCustomClass::admin_warnings('Gravity Forms Custom Style', 'GFCustomStyle', '1.5');
    }

    /*
     * render some custom JS to get the settings to work
     */
    function render_editor_js(){

      $btn_url = GFCustomClass::get_base_url() . '/btn.png';

      $modal_html = "
              <div id='css_ready_modal'>
                <style>

                #css_ready_modal h4 {
                  margin-bottom:2px;
              }
              .cssr_accordian {
                  display:none;
              }
              a.cssr_acc_link {
                  display: block;
                  padding: 12px 20px;
                  text-decoration: none;
                  text-align: left;
                  background: #1b2733;
                  border: none;
                  font-size: 14px;
                  color: #fff;
                  box-shadow: 0px 0px 5px -3px #000;
              }
              a.cssr_link {
                  text-decoration: none;
                  margin: 5px 0;
                  margin-left: 2%;
                  text-align: center;
                  border-right: 0;
                  padding: 6px 3px;
                  font-size: 16px;
                  color: #fff;
                  background: #18e0c4;
                  display: inline-block;
                  box-shadow: 0px 0px 3px -2px #000;
                  transition: .2s ease-in-out;
                }

              a.cssr_link:first-child {
                  margin-left: 0;
              }
              a.cssr_link:hover {
                box-shadow: 0px 0px 8px -2px #000;
                  // background: #7f6fce;
              }
              a.cssr_link.active {
                background: #7f6fce;
              }
              ul.cssr_ul {
                  margin:0; padding: 0;
              }
              ul.cssr_ul li {
                  margin-bottom: 3px; padding: 0;
              }
              #TB_closeWindowButton.btn-salve {
                position: relative;
                background: orange;
                color: #fff;
                padding: 3px 18px;
                border-radius: 3px;
                float: right;
                font-size: 14px;
                text-align: center;
                text-transform: uppercase;
                width: auto;
                box-shadow: -1px 1px 4px -2px #000;
                margin-top: 10px;
              }
              #TB_closeWindowButton.btn-salve:hover {
                box-shadow: 0px 0px 8px -1px #000;
              }
              #TB_title,
              #TB_closeWindowButton.btn-salve:before {
                display: none;
              }

                </style>
                <h3 style='margin-bottom: 15px;text-align: center;font-weight: 400;font-size: 22px; line-height: 1.5;'>Select the column and position element</h3>
                <ul class='cssr_ul'>
                  <li>
                    <a class='cssr_acc_link' href='#'>1 Column</a>
                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:99%'' href='#' rel='col w1' title='gf_left_half'>Full Column</a>
                    </div>
                  </li>

                  <li>
                    <a class='cssr_acc_link' href='#'>2 Columns</a>
                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:48%'' href='#' rel='col w2 w-clear' title='gf_left_half'>First Item</a>
                      <a class='cssr_link' style='width:48%'' href='#' rel='col w2' title='gf_right_half'>Second Item</a>
                    </div>
                  </li>

                  <li>
                    <a class='cssr_acc_link' href='#'>3 Columns</a>
                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:31%' href='#' rel='col w3 w-clear' title='gf_left_third'>First Item</a>
                      <a class='cssr_link' style='width:31%' href='#' rel='col w3' title='gf_middle_third'>Second Item</a>
                      <a class='cssr_link' style='width:31%' href='#' rel='col w3' title='gf_right_third'>Third Item</a>
                    </div>
                  </li>

                  <li>
                    <a class='cssr_acc_link' href='#'>3 Columns Special</a>

                    <div class='cssr_accordian' style='border-bottom: 2px dashed #bbbbbb;margin: 5px 0;padding-bottom: 5px;'>
                      <a class='cssr_link' style='width:48%;' href='#' rel='col w2 w-clear' title='gf_left_third'>First Item</a>
                      <a class='cssr_link' style='width:22.5%;' href='#' rel='col w4-2' title='gf_middle_third'>Second Item</a>
                      <a class='cssr_link' style='width:22.5%;' href='#' rel='col w4-2' title='gf_right_third'>Third Item</a>
                    </div>

                    <div class='cssr_accordian' style='border-bottom: 2px dashed #bbbbbb;margin: 5px 0;padding-bottom: 5px;'>
                    <a class='cssr_link' style='width:22.5%' href='#' rel='col w4-2 w-clear' title='gf_right_third'>Third Item</a>
                    <a class='cssr_link' style='width:22.5%' href='#' rel='col w4-2' title='gf_middle_third'>Second Item</a>
                    <a class='cssr_link' style='width:48%' href='#' rel='col w2' title='gf_left_third'>First Item</a>
                    </div>

                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4-2 w-clear' title='gf_middle_third'>Second Item</a>
                      <a class='cssr_link' style='width:48%' href='#' rel='col w2' title='gf_left_third'>First Item</a>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4-2' title='gf_right_third'>Third Item</a>
                    </div>
                  </li>

                  <li>
                    <a class='cssr_acc_link' href='#'>4 Columns</a>
                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4 w-clear' title='gf_left_third'>First Item</a>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4' title='gf_middle_third'>Second Item</a>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4' title='gf_right_third'>Third Item</a>
                      <a class='cssr_link' style='width:22.5%' href='#' rel='col w4' title='gf_right_third'>Fourth Item</a>
                    </div>
                  </li>

                  <li>
                    <a class='cssr_acc_link' href='#'>Title</a>
                    <div class='cssr_accordian'>
                      <a class='cssr_link' style='width:30%' rel='no-label' title='gf_list_2col' href='#'>Remove Title</a>
                    </div>
                  </li>
                </ul>

                <span id='TB_closeWindowButton' class='btn-salve tb-close-icon'>Save</span>
              ";

      ?>
      <script type='text/javascript'>

          function removeTokenFromInput(input, tokenPos,seperator) {
              var text = input.val();

              var tokens = text.split(seperator);
              var newText = '';
              for(i = 0; i < tokens.length; i++)
              {
                  if (tokens[i].replace(' ','').replace(seperator,'') == '')
                      { continue; }
                  if (i != tokenPos) {
                      newText += (tokens[i].trim()+seperator);
                  }
              }
              input.val(fixTokens(newText, seperator));
          }

          function addTokenToInput(input, tokenToAdd, seperator) {
              var text = input.val().trim();
              if (text == '') {
                  input.val(tokenToAdd);
              }
              else {
                  if (!tokenExists(input, tokenToAdd, seperator))
                      { input.val(fixTokens(text + seperator + tokenToAdd, seperator)); }
              }
          }

          function fixTokens(tokens, seperator) {
              var text = tokens.trim();
              var tokens = text.split(seperator);
              var newTokens = '';
              for(i = 0; i < tokens.length; i++)
              {
                  var token = tokens[i].trim().replace(seperator,'');
                  if (token == '') { continue; }
                  newTokens += (token + seperator);
              }
              return newTokens;
          }

          function tokenExists(input, tokenToCheck, seperator) {
              var text = input.val().trim();
              if (text == '') return false;
              var tokens = text.split(seperator);
              for(i = 0; i < tokens.length; i++)
              {
                  var token = tokens[i].trim().replace(seperator,'');
                  if (token == '') { continue; }
                  if (token == tokenToCheck) {
                      return true;
                  }
              }
              return false;
          }

          jQuery(document).bind("gform_load_field_settings", function(event, field, form){

            if (jQuery("#css_ready_selector").length == 0) {

              //add some html after the CSS Class Name input
              var $select_link = jQuery("<a id='css_ready_selector' class='thickbox' href='#TB_inline?width=500&height=550&inlineId=css_ready_modal'><img src='<?php echo $btn_url; ?>' /></a>");

              var $modal = jQuery("<?php echo preg_replace( '/\s*[\r\n\t]+\s*/', '', $modal_html ); ?>").hide();

              jQuery(".css_class_setting").append($select_link).append($modal);

              $select_link.click(function(e) {
                e.preventDefault();
                var $m = jQuery("#css_ready_modal");

                $m.find(".cssr_acc_link").unbind("click").click(function(e) {
                  e.preventDefault();
                  jQuery('.cssr_accordian:visible').slideUp();
                  jQuery(this).parent("li:first").find(".cssr_accordian").slideDown();
                });

                var $links = $m.find(".cssr_link");

                $links.unbind("click").click(function(e) {
                  e.preventDefault();
                    if(jQuery(this).hasClass('active')) {
                    var css = jQuery(this).attr("rel");
                    removeTokenFromInput(jQuery("#field_css_class"), css, ' ');
                    SetFieldProperty('cssClass', jQuery("#field_css_class").val().trim());
                  } else {
                    var css = jQuery(this).attr("rel");
                    addTokenToInput(jQuery("#field_css_class"), css, ' ');
                    SetFieldProperty('cssClass', jQuery("#field_css_class").val().trim());
                    jQuery(this).addClass('active');
                    console.log('add class');
                  }
                });

                $links.unbind("dblclick").dblclick(function(e) {
                  e.preventDefault();
                  var css = jQuery(this).attr("rel");
                  tokenExists(jQuery("#field_css_class"), css, ' ');
                  SetFieldProperty('cssClass', jQuery("#field_css_class").val().trim());
                  tb_remove();
                });

				tb_show('', this.href, false);
              });

            }

          });

      </script>
      <?php
    }
  }
}
?>
