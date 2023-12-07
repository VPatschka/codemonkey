```php
<?php

final class InfoData
{
    public string $code;
    public string $message;

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
        ];
    }
}
```