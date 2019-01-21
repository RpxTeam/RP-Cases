<?php

// CAMPOS DE PERFIL PERSONALIZADOS
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
 
function my_show_extra_profile_fields( $user ) { ?>
 
    <h3>Você nas redes sociais</h3>
 
    <table class="form-table">
 
        <tr>
            <th><label for="twitter">Twitter</label></th>
 
            <td>
                <input type="text" name="twitteruser" id="twitteruser" value="<?php echo esc_attr( get_the_author_meta( 'twitteruser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu nome de usuário do Twitter</span>
            </td>
        </tr>
 
        <tr>
            <th><label for="facebookuser">Facebook</label></th>
 
            <td>
                <input type="text" name="facebookuser" id="facebookuser" value="<?php echo esc_attr( get_the_author_meta( 'facebookuser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Facebook (URL)</span>
            </td>
        </tr>     
 
    </table>
 
    <h3>Mais sobre si</h3>
 
    <table class="form-table">
 
        <tr>
            <th><label for="pais">País</label></th>
 
            <td>
                <input type="text" name="pais" id="pais" value="<?php echo esc_attr( get_the_author_meta( 'pais', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu país</span>
            </td>
        </tr>
 
        <tr>
            <th><label for="cidade">Cidade</label></th>
 
            <td>
                <input type="text" name="cidade" id="cidade" value="<?php echo esc_attr( get_the_author_meta( 'cidade', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Cidade onde se encontra</span>
            </td>
        </tr>     
 
    </table>  
<?php } ?>