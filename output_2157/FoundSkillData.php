```php
<?php

final class FoundSkillData
{
    public string $skill;
    public bool $isCurrent;

    public function toArray(): array
    {
        return [
            'skill' => $this->skill,
            'isCurrent' => $this->isCurrent,
        ];
    }
}
```