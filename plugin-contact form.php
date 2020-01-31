<?php
/**
*Plugin name: contact form
*Description: connect to other page
*/


function contact_form()
{
    $content = '';
    $content .= '<h2>For more recommend please contact below ...</h2>';

    $content .= '<form method="post" action="http://localhost/webone/index.php/thank-you/">';

    $content .='<label for="your_name">name  </label>';
    $content .='<br><input type="text" name="your_name" placeholder="Please Enter your name" />';

    $content .= '<br><br><label for="your_email">E-mail  </label>';
    $content .= '<br><input type="email" name="your_email" placeholder="Please Enter your E-mail" />';

    $content .='<br><br><label for="your_comment">comment </label>';
    $content .='<br><textarea name="your_comment" placeholder="Enter your comment"></textarea>';

    $content .='<br><br><input type="submit" name="submit_your_request" value="Send your Information" />';

    $content .='</form>';

    return $content;

}
add_shortcode('home_page', 'contact_form');

function contact_capture()
{
    if(isset($_POST['submit_your_request']))
    {
        $name = sanitize_text_field($_POST['your_name']);
        $email = sanitize_text_field($_POST['your_email']);
        $comment = sanitize_textarea_field($_POST['your_comment']);

        $to = 'atwbn.bm@gmail.com';
        $subject = 'Test for working process';
        $message = ''.$name.' - '.$email.' - '.$comment;

        wp_mail($to,$subject,$message);
    }
}
add_action('wp_head', 'contact_capture');

?>