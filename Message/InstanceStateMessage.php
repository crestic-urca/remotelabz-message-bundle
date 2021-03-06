<?php

namespace Remotelabz\Message\Message;

use InvalidArgumentException;

class InstanceStateMessage
{
    private $type;
    private $uuid;
    private $state;

    const TYPE_LAB = "lab";
    const TYPE_DEVICE = "device";

    const STATE_CREATING = "creating";
    const STATE_DELETING = "deleting";
    const STATE_CREATED = "created";
    const STATE_DELETED = "deleted";
    const STATE_STARTING = "starting";
    const STATE_STOPPING = "stopping";
    const STATE_EXPORTING = "exporting";
    const STATE_STARTED = "started";
    const STATE_STOPPED = "stopped";
    const STATE_ERROR = "error";

    public function __construct(string $type = self::TYPE_DEVICE, string $uuid, string $state)
    {
        if (!in_array($state, [self::STATE_CREATED, self::STATE_CREATING, self::STATE_DELETED, self::STATE_DELETING, self::STATE_ERROR, self::STATE_STARTED, self::STATE_STARTING, self::STATE_STOPPED, self::STATE_STOPPING])) {
            throw new InvalidArgumentException('Wrong state provided');
        }

        if (!in_array($type, [self::TYPE_DEVICE, self::TYPE_LAB])) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->type = $type;
        $this->uuid = $uuid;
        $this->state = $state;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        if (!in_array($type, [self::TYPE_DEVICE, self::TYPE_LAB])) {
            throw new InvalidArgumentException('Wrong type provided');
        }

        $this->type = $type;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        if (!in_array($state, [self::STATE_CREATED, self::STATE_CREATING, self::STATE_DELETED, self::STATE_DELETING, self::STATE_ERROR, self::STATE_STARTED, self::STATE_STARTING, self::STATE_STOPPED, self::STATE_STOPPING])) {
            throw new InvalidArgumentException('Wrong state provided');
        }

        $this->state = $state;

        return $this;
    }
}
