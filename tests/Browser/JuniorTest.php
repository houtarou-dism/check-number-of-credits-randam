<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;


class JuniorTest extends DuskTestCase
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
                    ->select('selectYear', 'junior')
                    ->click('#select-submit-btn');

            //１年次
            $browser->assertPathIs('/select_year/junior/1')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#freshman-submit-btn')
                    ->click('#freshman-submit-btn');

            //２年次
            $browser->assertPathIs('/select_year/junior/2')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#sophomore-submit-btn')
                    ->click('#sophomore-submit-btn');

            //３年次
            $browser->assertPathIs('/select_year/junior/3')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#confirmation-junior-submit-button')
                    ->click('#confirmation-junior-submit-button')
                    ->whenAvailable('.modal', static function ($modal){
                        $modal->assertSee('単位取得数チェック')
                              ->click('#check-submit-btn');
                    });

            //結果画面
            $browser->assertPathIs('/select_year/junior/check-college-credits')
                    ->assertSee(6);

        });
    }
}
