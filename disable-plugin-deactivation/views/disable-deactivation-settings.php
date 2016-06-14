<div class="wrap">
    <h3><?php _e('Disable Plugin Deactivation Settings'); ?></h3>

    <form method="post" action="options.php">
        <?php settings_fields('disable-deactivation-words-group'); ?>
        <?php do_settings_sections('disable-deactivation-words-group'); ?>
        <table class="form-table">                       
            <tr valign="top">
                <th scope="row"><?php _e("Disable Plugin Deactivation :"); ?> <span style="font-size: 11px;">(By Default it is Disable)</span></th>
                <td>
                    <select class="regular-select" name="disable_plugin_deactivation">
                        <option value="false" <?php selected(get_option('disable_plugin_deactivation'), 'false'); ?>><?php _e("Disable"); ?></option>
                        <option value="true" <?php selected(get_option('disable_plugin_deactivation'), 'true'); ?>><?php _e("Enable"); ?></option>                                           
                    </select>
                </td>                
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e("Disable Plugin Activation :"); ?> <span style="font-size: 11px;">(By Default it is Disable)</span></th>
                <td>
                    <select class="regular-select" name="disable_plugin_activation">
                        <option value="false" <?php selected(get_option('disable_plugin_activation'), 'false'); ?>><?php _e("Disable"); ?></option>
                        <option value="true" <?php selected(get_option('disable_plugin_activation'), 'true'); ?>><?php _e("Enable"); ?></option>                                           
                    </select>
                </td>                
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e("Disable Plugin Deletion :"); ?> <span style="font-size: 11px;">(By Default it is Disable)</span></th>
                <td>
                    <select class="regular-select" name="disable_plugin_deletion">
                        <option value="false" <?php selected(get_option('disable_plugin_deletion'), 'false'); ?>><?php _e("Disable"); ?></option>
                        <option value="true" <?php selected(get_option('disable_plugin_deletion'), 'true'); ?>><?php _e("Enable"); ?></option>                                           
                    </select>
                </td>                
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e("Disable Plugin Update :"); ?> <span style="font-size: 11px;">(By Default it is Disable)</span></th>
                <td>
                    <select class="regular-select" name="disable_plugin_update">
                        <option value="false" <?php selected(get_option('disable_plugin_update'), 'false'); ?>><?php _e("Disable"); ?></option>
                        <option value="true" <?php selected(get_option('disable_plugin_update'), 'true'); ?>><?php _e("Enable"); ?></option>                                           
                    </select>
                </td>                
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>