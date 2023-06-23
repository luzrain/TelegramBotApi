<?php

declare(strict_types=1);

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Client;
use TelegramBot\Api\Test\Helper\ClosureTestHelper;
use TelegramBot\Api\Types\Update;

final class ClientTest extends TestCase
{
    private Client $client;

    public function setUp(): void
    {
        $this->client = new Client();
    }

    public static function clientWebhookData(): iterable
    {
        yield ['command', file_get_contents(__DIR__ . '/data/events/command.json')];
        yield ['message', file_get_contents(__DIR__ . '/data/events/message.json')];
        yield ['editedMessage', file_get_contents(__DIR__ . '/data/events/editedMessage.json')];
        yield ['channelPost', file_get_contents(__DIR__ . '/data/events/channelPost.json')];
        yield ['editedChannelPost', file_get_contents(__DIR__ . '/data/events/editedChannelPost.json')];
        yield ['inlineQuery', file_get_contents(__DIR__ . '/data/events/inlineQuery.json')];
        yield ['chosenInlineResult', file_get_contents(__DIR__ . '/data/events/chosenInlineResult.json')];
        yield ['callbackQuery', file_get_contents(__DIR__ . '/data/events/callbackQuery.json')];
        yield ['shippingQuery', file_get_contents(__DIR__ . '/data/events/shippingQuery.json')];
        yield ['preCheckoutQuery', file_get_contents(__DIR__ . '/data/events/preCheckoutQuery.json')];
        yield ['poll', file_get_contents(__DIR__ . '/data/events/poll.json')];
        yield ['pollAnswer', file_get_contents(__DIR__ . '/data/events/pollAnswer.json')];
        yield ['myChatMember', file_get_contents(__DIR__ . '/data/events/myChatMember.json')];
    }

    #[DataProvider('clientWebhookData')]
    public function testClientWebhook(string $eventName, string $requestBody): void
    {
        $updateClosure = new ClosureTestHelper();
        $commandClosure = new ClosureTestHelper();
        $wrongCommandClosure = new ClosureTestHelper();
        $messageClosure = new ClosureTestHelper();
        $editedMessageClosure = new ClosureTestHelper();
        $channelPostClosure = new ClosureTestHelper();
        $editedChannelPostClosure = new ClosureTestHelper();
        $inlineQueryClosure = new ClosureTestHelper();
        $chosenInlineResultClosure = new ClosureTestHelper();
        $callbackQueryClosure = new ClosureTestHelper();
        $shippingQueryClosure = new ClosureTestHelper();
        $preCheckoutQueryClosure = new ClosureTestHelper();
        $pollClosure = new ClosureTestHelper();
        $pollAnswerClosure = new ClosureTestHelper();
        $myChatMember = new ClosureTestHelper();

        $this->client
            ->onUpdate($updateClosure->getClosure())
            ->onCommand('/testcommand', $commandClosure->getClosure())
            ->onCommand('/wrongcommand', $wrongCommandClosure->getClosure())
            ->onMessage($messageClosure->getClosure())
            ->onEditedMessage($editedMessageClosure->getClosure())
            ->onChannelPost($channelPostClosure->getClosure())
            ->onEditedChannelPost($editedChannelPostClosure->getClosure())
            ->onInlineQuery($inlineQueryClosure->getClosure())
            ->onChosenInlineResult($chosenInlineResultClosure->getClosure())
            ->onCallbackQuery($callbackQueryClosure->getClosure())
            ->onShippingQuery($shippingQueryClosure->getClosure())
            ->onPreCheckoutQuery($preCheckoutQueryClosure->getClosure())
            ->onPoll($pollClosure->getClosure())
            ->onPollAnswer($pollAnswerClosure->getClosure())
            ->onMyChatMember($myChatMember->getClosure())
            ->webhookHandle($requestBody)
        ;

        $this->assertSame(true, $updateClosure->isCalled());
        $this->assertSame($eventName === 'command', $commandClosure->isCalled());
        $this->assertSame(false, $wrongCommandClosure->isCalled());
        $this->assertSame(in_array($eventName, ['command', 'message']), $messageClosure->isCalled());
        $this->assertSame($eventName === 'editedMessage', $editedMessageClosure->isCalled());
        $this->assertSame($eventName === 'channelPost', $channelPostClosure->isCalled());
        $this->assertSame($eventName === 'editedChannelPost', $editedChannelPostClosure->isCalled());
        $this->assertSame($eventName === 'inlineQuery', $inlineQueryClosure->isCalled());
        $this->assertSame($eventName === 'chosenInlineResult', $chosenInlineResultClosure->isCalled());
        $this->assertSame($eventName === 'callbackQuery', $callbackQueryClosure->isCalled());
        $this->assertSame($eventName === 'shippingQuery', $shippingQueryClosure->isCalled());
        $this->assertSame($eventName === 'preCheckoutQuery', $preCheckoutQueryClosure->isCalled());
        $this->assertSame($eventName === 'poll', $pollClosure->isCalled());
        $this->assertSame($eventName === 'pollAnswer', $pollAnswerClosure->isCalled());
        $this->assertSame($eventName === 'myChatMember', $myChatMember->isCalled());
    }

    public function testClientHandler(): void
    {
        $commandClosure = new ClosureTestHelper();
        $editedMessageClosure = new ClosureTestHelper();
        $channelPostClosure = new ClosureTestHelper();
        $editedChannelPostClosure = new ClosureTestHelper();

        $updates = [
            Update::fromResponse(json_decode(file_get_contents(__DIR__ . '/data/events/command.json'), true)),
            Update::fromResponse(json_decode(file_get_contents(__DIR__ . '/data/events/editedMessage.json'), true)),
            Update::fromResponse(json_decode(file_get_contents(__DIR__ . '/data/events/channelPost.json'), true)),
        ];

        $this->client
            ->onCommand('/testcommand', $commandClosure->getClosure())
            ->onEditedMessage($editedMessageClosure->getClosure())
            ->onChannelPost($channelPostClosure->getClosure())
            ->onEditedChannelPost($editedChannelPostClosure->getClosure())
            ->updatesHandle($updates)
        ;

        $this->assertTrue($commandClosure->isCalled());
        $this->assertTrue($editedMessageClosure->isCalled());
        $this->assertTrue($channelPostClosure->isCalled());
        $this->assertFalse($editedChannelPostClosure->isCalled());
    }
}
