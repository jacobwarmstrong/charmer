<?php
/**
 * Email Sent Modal, used on Single Product page (not woocommerce products), and Contact page.
 *
 * @package ako_signs_2018_q1
 */

if( isset($_GET['mailSent']) && $_GET['mailSent'] == 'true' ) {
    $modelTitle = "Your Request Has Been Sent!";
    $modelMessage = "Thank you for your request, we look forward to working with you. You should receive a email from a sales representative as soon as possible.";
} elseif ( isset($_GET['mailSent']) && $_GET['mailSent'] == 'false' ) {
    if ( isset($_GET['validation']) ) {
        switch($_GET['validation']) {
            case 'phone':
                $modelTitle = "Invalid Phone Number";
                $modelMessage = "You unfortunately input an invalid phone number, please input a 10 digit phone number.";
                break;
            default:
                $modelTitle = "Validation Error";
                $modelMessage = "We found an error with one of your form inputs, but don't know which one... We should do better, but could you try again?";
        }
    } else {
        $modelTitle = "Hmm. Something Went Wrong And Were Not Sure What.";
        $modelMessage = "Something happened and we didnt get your message. Could you please try again?";
    }
}
    

if( isset($_GET['mailSent'])) : ?>

<div id="mailSentModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $modelTitle; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $modelMessage; ?></p>
      </div>
    </div>
  </div>
</div>

<?php endif;


