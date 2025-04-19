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

    // Método auxiliar para crear un objeto de error
    public static function error(
        string $resultText,
        ?string $resultDetail = null,
        mixed $resultContent = null
    ): self {
        return new self(
            isOk: false,
            resultType: 'error',
            resultText: $resultText,
            resultDetail: $resultDetail,
            resultContent: $resultContent
        );
    }
}
?>
