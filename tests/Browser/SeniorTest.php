<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;


class SeniorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testExample(): void
    {
        $this->browse(static function (Browser $browser) {

            //トップページ
            $browser->visit('/')
                    ->select('selectYear', 'senior')
                    ->click('#select-submit-btn');

            //１年次
            $browser->assertPathIs('/select_year/senior/1')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#freshman-submit-btn')
                    ->click('#freshman-submit-btn');

            //２年次
            $browser->assertPathIs('/select_year/senior/2')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#sophomore-submit-btn')
                    ->click('#sophomore-submit-btn');

            //３年次
            $browser->assertPathIs('/select_year/senior/3')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#junior-submit-btn')
                    ->click('#junior-submit-btn');

            //４年次
            $browser->assertPathIs('/select_year/senior/4')
                    ->check('label[for="lae-cb-a"]')
                    ->scrollTo('#confirmation-senior-submit-button')
                    ->click('#confirmation-senior-submit-button')
                    ->whenAvailable('.modal', static function ($modal){
                        $modal->assertSee('単位取得数チェック')
                              ->click('#check-submit-btn');
                    });

            //結果画面
            $browser->assertPathIs('/select_year/senior/check-college-credits')
                    ->assertSee(8);
        });
    }
}
