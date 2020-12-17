<?php 
/* /home/u236745344/domains/qweli.org/public_html/tastytreats/themes/tastyigniter-orange/_pages/local/reviews.blade.php */
class Pagic5fda054d5dca8036603799_889d4db412bf032ea62140e06b498189Class extends \Main\Template\Code\PageCode
{

public function onStart()
{
    if (!View::shared('showReviews')) {
        flash()->error(lang('igniter.local::default.review.alert_review_disabled'))->now();

        return Redirect::to($this->controller->pageUrl($this['localReview']->property('redirectPage')));
    }
}

}
