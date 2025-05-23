<?php
namespace App\Responses;

class ResponseObject {
    public bool $isOk;
    public string $Type;
    public ?string $Message;
    public ?string $Detail;
    public mixed $Content;
    public int $Rows;

    public function __construct(
        bool $isOk = true,
        string $Type = 'success',
        ?string $Message = null,
        ?string $Detail = null,
        mixed $Content = null,
        int $Rows = 0
    ) {
        $this->isOk = $isOk;
        $this->Type = $Type;
        $this->Message = $Message;
        $this->Detail = $Detail;
        $this->Content = $Content;
        $this->Rows = $Rows;
    }

    public function setSuccess(
        string $Message,
        mixed $Content = null,
        int $Rows = 0
    ): void {
        $this->isOk = true;
        $this->Type = 'success';
        $this->Message = $Message;
        $this->Detail = null;
        $this->Content = $Content;
        $this->Rows = $Rows;
    }

    public function setWarning(
        string $Message,
        ?string $Detail = null,
        mixed $Content = null
    ): void {
        $this->isOk = false;
        $this->Type = 'warning';
        $this->Message = $Message;
        $this->Detail = $Detail;
        $this->Content = $Content;
        $this->Rows = 0;
    }

    public function setError(
        string $Message,
        ?string $Detail = null,
        mixed $Content = null
    ): void {
        $this->isOk = false;
        $this->Type = 'error';
        $this->Message = $Message;
        $this->Detail = $Detail;
        $this->Content = $Content;
        $this->Rows = 0;
    }
}
