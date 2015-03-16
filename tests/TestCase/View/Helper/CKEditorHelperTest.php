<?php
namespace AkkaCKEditor\Test\TestCase\View\Helper;

use AkkaCKEditor\View\Helper\CKEditorHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * AkkaCKEditor\View\Helper\CKEditorHelper Test Case
 */
class CKEditorHelperTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->CKEditor = new CKEditorHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CKEditor);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
