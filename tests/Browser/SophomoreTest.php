<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;


class SophomoreTest extends DuskTestCase
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
                    ->select('selectYear', 'sophomore')
                    ->click('#select-submit-btn');

            //１年次
            $browser->assertPathIs('/select_year/sophomore/1')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#freshman-submit-btn')
                    ->click('#freshman-submit-btn');

            //２年次
            $browser->assertPathIs('/select_year/sophomore/2')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#confirmation-sophomore-submit-button')
                    ->click('#confirmation-sophomore-submit-button')
                    ->whenAvailable('.modal', static function ($modal){
                        $modal->assertSee('単位取得数チェック')
                              ->click('#check-submit-btn');
                    });

            //結果画面
            $browser->assertPathIs('/select_year/sophomore/check-college-credits')
                    ->assertSee(4);
        });
    }
}
