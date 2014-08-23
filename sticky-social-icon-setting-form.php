<?php
@ini_set('display_errors', 0);
global $wpdb;

$stickySocialIconTable  = $wpdb->prefix . "sticky_social_icon";
settings_fields('sticky-social-icon');

//Update submit value
if(!empty($_POST['link'])) {

    $data = array('facebook'  => isset($_POST['link']['facebook'])? $_POST['link']['facebook']:'',
                  'twitter'   => isset($_POST['link']['twitter'])? $_POST['link']['twitter']:'',
                  'vemo'      => isset($_POST['link']['vemo'])? $_POST['link']['vemo']:'',
									'youtube'   => isset($_POST['link']['youtube'])? $_POST['link']['youtube']:'',
                  'rss'       => isset($_POST['link']['rss'])? $_POST['link']['rss']:'',
                  'pinterest' => isset($_POST['link']['pinterest'])? $_POST['link']['pinterest']:'',
                  'tumblr'    => isset($_POST['link']['tumblr'])? $_POST['link']['tumblr']:'',
									'digg'    => isset($_POST['link']['digg'])? $_POST['link']['digg']:'',
									'flickr'    => isset($_POST['link']['flickr'])? $_POST['link']['flickr']:'',
									'gplus'    => isset($_POST['link']['gplus'])? $_POST['link']['gplus']:'',
									'instagram'    => isset($_POST['link']['instagram'])? $_POST['link']['instagram']:'',
				          'skype'    => isset($_POST['link']['skype'])? $_POST['link']['skype']:'',
									'stumbleupon'    => isset($_POST['link']['stumbleupon'])? $_POST['link']['stumbleupon']:'',								 
									'color_th'    => isset($_POST['link']['color_th'])? $_POST['link']['color_th']:'',
                  'linkedin'  => isset($_POST['link']['linkedin'])? $_POST['link']['linkedin']:''
                );

    $wpdb->update($stickySocialIconTable, $data, array('id' => 1));
}

// Define form value
$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$stickySocialIconTable} WHERE id = 1"));
$link   = (!empty($_POST['link'])) ? $_POST['link'] : get_object_vars($result[0]);

 
?>
 
<div class="wrap">
    <h2>Sticky Social Icon Setting</h2>
      
    <?php if(!empty($_POST['link'])) : ?>
    <div class="updated inline below-h2">
        <p> All links are updated successfully. </p>
    </div>
<br/>
<?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
        <?php wp_nonce_field('update-options'); ?>
        <table>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Facebook:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[facebook]" id='facebook' value="<?php echo $link['facebook']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Twitter:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[twitter]" id='twitter' value="<?php echo $link['twitter']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Vimeo:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[vemo]" id='vemo' value="<?php echo $link['vemo']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Pinterest:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[pinterest]" id='pinterest' value="<?php echo $link['pinterest']; ?>"/>
                </td>
            </tr>
             <tr>
                <td>
                    <label for="link[facebook]">
                        Youtube:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[youtube]" id='youtube' value="<?php echo $link['youtube']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Digg:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[digg]" id='digg' value="<?php echo $link['digg']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Flickr:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[flickr]" id='flickr' value="<?php echo $link['flickr']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Gplus:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[gplus]" id='gplus' value="<?php echo $link['gplus']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Instagram:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[instagram]" id='instagram' value="<?php echo $link['instagram']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        Skype:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[skype]" id='skype' value="<?php echo $link['skype']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[facebook]">
                        StumbleUpon:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[stumbleupon]" id='stumbleupon' value="<?php echo $link['stumbleupon']; ?>"/>
                </td>
            </tr>
             <tr>
                <td>
                    <label for="link[facebook]">
                        RSS:
                    </label>

                </td>
                <td>
                    <input type="text" name="link[rss]" id='rss' value="<?php echo $link['rss']; ?>"/>
                </td>
            </tr>
             <tr>
                <td>
                    <label for="link[linkedin]">
                        LinkedIn:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[linkedin]" id='linkedin' value="<?php echo $link['linkedin']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[linkedin]">
                        Tumblr:
                    </label>
                </td>
                <td>
                    <input type="text" name="link[tumblr]" id='tumblr' value="<?php echo $link['tumblr']; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="link[linkedin]">
                        Color Theme:
                    </label>
                </td>
                <td>
                <?php /*?> <p><input type="text" maxlength="6" size="6" name="link[color_th]" id="colorpickerField1" value="<?php echo $link['color_th']; ?>" /></p><?php */?>
                      <input name="link[color_th]" id="link-color" type="text" value="<?php if ( isset( $link['color_th'] ) ) echo $link['color_th']; ?>" /> 
                </td>
            </tr>
        </table>

        <input type="submit" class="button-primary" name="save-fav-icon" value="<?php _e('Save Changes') ?>"/>
        <input type="hidden" name="action" value="update"/>
    </form>
</div>