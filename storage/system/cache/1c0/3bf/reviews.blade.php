<?php 
/* C:\xampp\htdocs\laravel\tasty\setup-master\themes\tastyigniter-orange/_pages/local\reviews.blade.php */
class Pagic5fd7b317aff16384052500_c021cc25f7b39e4c3b345d7ffeba8feeClass extends \Main\Template\Code\PageCode
{

public function onStart() {
    if (!setting('allow_reviews')) {
        flash()->error(lang('igniter.local::default.review.alert_review_disabled'))->now();

        return Redirect::to($controller->pageUrl($localReview->property('redirectPage')));
    }
}

}
