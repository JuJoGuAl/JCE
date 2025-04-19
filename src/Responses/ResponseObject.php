<?php
namespace App\Responses;

class ResponseObject {
    public bool $isOk;
    public string $resultType;
    public ?string $resultTitle;
    public ?string $resultText;
    public ?string $resultDetail;
    public mixed $resultContent;
    public int $resultRows;

    public function __construct(
        bool $isOk = true,
        string $resultType = 'success',
        ?string $resultTitle = null,
        ?string $resultText = null,
        ?string $resultDetail = null,
        mixed $resultContent = null,
        int $resultRows = 0
    ) {
        $this->isOk = $isOk;
        $this->resultType = $resultType;
        $this->resultTitle = $resultTitle;
        $this->resultText = $resultText;
        $this->resultDetail = $resultDetail;
        $this->resultContent = $resultContent;
        $this->resultRows = $resultRows;
    }

    public function setSuccess(
        string $resultTitle,
        string $resultText,
        mixed $resultContent = null,
        int $resultRows = 0
    ): void {
        $this->isOk = true;
        $this->resultType = 'success';
        $this->resultTitle = $resultTitle;
        $this->resultText = $resultText;
        $this->resultDetail = null;
        $this->resultContent = $resultContent;
        $this->resultRows = $resultRows;
    }

    public function setError(
        string $resultText,
        ?string $resultDetail = null,
        mixed $resultContent = null
    ): void {
        $this->isOk = false;
        $this->resultType = 'error';
        $this->resultTitle = 'Error';
        $this->resultText = $resultText;
        $this->resultDetail = $resultDetail;
        $this->resultContent = $resultContent;
        $this->resultRows = 0;
    }
}
