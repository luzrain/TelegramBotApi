<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Method;

use Luzrain\TelegramBotApi\Method;
use Luzrain\TelegramBotApi\Type\ForceReply;
use Luzrain\TelegramBotApi\Type\InlineKeyboardMarkup;
use Luzrain\TelegramBotApi\Type\InputFile;
use Luzrain\TelegramBotApi\Type\Message;
use Luzrain\TelegramBotApi\Type\MessageEntity;
use Luzrain\TelegramBotApi\Type\ReplyKeyboardMarkup;
use Luzrain\TelegramBotApi\Type\ReplyKeyboardRemove;
use Luzrain\TelegramBotApi\Type\ReplyParameters;

/**
 * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document).
 * On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 *
 * @extends Method<Message>
 */
final class SendVideo extends Method
{
    protected static string $methodName = 'sendVideo';
    protected static string $responseClass = Message::class;

    public function __construct(
        /**
         * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         */
        protected int|string $chatId,

        /**
         * Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended),
         * pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data.
         */
        protected InputFile|string $video,

        /**
         * Unique identifier of the business connection on behalf of which the message will be sent
         */
        protected string|null $businessConnectionId = null,

        /**
         * Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
         */
        protected int|null $messageThreadId = null,

        /**
         * Duration of sent video in seconds
         */
        protected int|null $duration = null,

        /**
         * Video width
         */
        protected int|null $width = null,

        /**
         * Video height
         */
        protected int|null $height = null,

        /**
         * Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side.
         * The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320.
         */
        protected InputFile|string|null $thumbnail = null,

        /**
         * Cover for the video in the message.
         */
        protected InputFile|string|null $cover = null,

        /**
         * Start timestamp for the video in the message
         */
        protected int|null $startTimestamp = null,

        /**
         * Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
         */
        protected string|null $caption = null,

        /**
         * Mode for parsing entities in the video caption. See formatting options for more details.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         */
        protected string|null $parseMode = null,

        /**
         * A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @var list<MessageEntity>|null
         */
        protected array|null $captionEntities = null,

        /**
         * Pass True, if the caption must be shown above the message media
         */
        protected bool|null $showCaptionAboveMedia = null,

        /**
         * Pass True if the video needs to be covered with a spoiler animation
         */
        protected bool|null $hasSpoiler = null,

        /**
         * Pass True if the uploaded video is suitable for streaming
         */
        protected bool|null $supportsStreaming = null,

        /**
         * Sends the message silently. Users will receive a notification with no sound.
         */
        protected bool|null $disableNotification = null,

        /**
         * Protects the contents of the sent message from forwarding and saving
         */
        protected bool|null $protectContent = null,

        /**
         * Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message.
         * The relevant Stars will be withdrawn from the bot's balance
         */
        protected bool|null $allowPaidBroadcast = null,

        /**
         * Unique identifier of the message effect to be added to the message; for private chats only
         */
        protected string|null $messageEffectId = null,

        /**
         * Description of the message to reply to
         */
        protected ReplyParameters|null $replyParameters = null,

        /**
         * Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
         * instructions to remove a reply keyboard or to force a reply from the user.
         * Not supported for messages sent on behalf of a business account.
         */
        protected InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup = null,
    ) {
    }
}
