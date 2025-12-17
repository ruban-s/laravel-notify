<?php

declare(strict_types=1);

namespace Tests\Unit;

use Mckenziearts\Notify\Notify;
use Mockery;
use PHPUnit\Framework\TestCase;

class NotifyTest extends TestCase
{
    protected $session;

    protected $notify;

    protected function setUp(): void
    {
        $this->session = Mockery::spy(\Mckenziearts\Notify\Storage\Session::class);
        $this->notify = new Notify($this->session);
    }
}
