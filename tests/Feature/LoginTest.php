<?php
namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

class LoginTest extends TestCase
{
    use ExpectDeprecationTrait;

    /**
     * @group legacy
     */
    public function testDeprecatedCode()
    {
        // test some code that triggers the following deprecation:
        // trigger_deprecation('vendor-name/package-name', '5.1', 'This "Foo" method is deprecated.');
        $this->expectDeprecation('Since vendor-name/package-name 5.1: This "%s" method is deprecated');

        // ...

        // test some code that triggers the following deprecation:
        // trigger_deprecation('vendor-name/package-name', '4.4', 'The second argument of the "Bar" method is deprecated.');
        $this->expectDeprecation('Since vendor-name/package-name 4.4: The second argument of the "%s" method is deprecated.');
    }

    /**
     * @test
     */
    public function login_admin_user()
    {
        $response = $this->get('http://symfony-exampleapi.localhost/login');
    }

}
