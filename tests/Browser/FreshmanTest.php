<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;


class FreshmanTest extends DuskTestCase
{
    /**
     *
     * @return void
     * @throws Throwable
     */
    public function testExample(): void
    {
        $this->browse(static function (Browser $browser) {

            //トップページ
            $browser->visit('/')
                    ->select('selectYear', 'freshman')
                    ->click('#select-submit-btn');

            //１年次
            $browser->assertPathIs('/select_year/freshman/1')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#confirmation-freshman-submit-button')
                    ->click('#confirmation-freshman-submit-button')
                    ->whenAvailable('.modal', static function ($modal){
                        $modal->assertSee('単位取得数チェック')
                              ->click('#check-submit-btn');
                    });

            //結果画面
            $browser->assertPathIs('/select_year/freshman/check-college-credits')
                    ->assertSee(2);
        });
    }
}
