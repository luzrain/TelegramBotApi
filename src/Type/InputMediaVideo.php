<?php

declare(strict_types=1);

namespace Luzrain\TelegramBotApi\Type;

use Luzrain\TelegramBotApi\Internal\ArrayType;

/**
 * Represents a video to be sent.
 */
final readonly class InputMediaVideo extends InputMedia
{
    public const TYPE = 'video';

    public function __construct(
        /**
         * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
         * pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload
         * a new one using multipart/form-data under <file_attach_name> name.
         */
        public InputFile|string $media,

        /**
         * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side.
         * The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320.
         */
        public InputFile|string|null $thumbnail = null,

        /**
         * Optional. Cover for the video in the message.
         */
        public InputFile|string|null $cover = null,

        /**
         * Optional. Start timestamp for the video in the message
         */
        public int|null $startTimestamp = null,

        /**
         * Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
         */
        public string|null $caption = null,

        /**
         * Optional. Mode for parsing entities in the video caption. See formatting options for more details.
         *
         * @see https://core.telegram.org/bots/api#formatting-options
         */
        public string|null $parseMode = null,

        /**
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @var list<MessageEntity>|null
         */
        #[ArrayType(MessageEntity::class)]
        public array|null $captionEntities = null,

        /**
         * Optional. Pass True, if the caption must be shown above the message media
         */
        public bool|null $showCaptionAboveMedia = null,

        /**
         * Optional. Video width
         */
        public int|null $width = null,

        /**
         * Optional. Video height
         */
        public int|null $height = null,

        /**
         * Optional. Video duration in seconds
         */
        public int|null $duration = null,

        /**
         * Optional. Pass True, if the uploaded video is suitable for streaming
         */
        public bool|null $supportsStreaming = null,

        /**
         * Optional. Pass True if the animation needs to be covered with a spoiler animation
         */
        public bool|null $hasSpoiler = null,
    ) {
        parent::__construct(self::TYPE);
    }
}
