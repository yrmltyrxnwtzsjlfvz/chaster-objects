<?php

namespace Fake\ChasterObjects\Objects;

use Bytes\StringMaskBundle\Twig\StringMaskRuntime;
use Fake\ChasterObjects\Enums\ProfileRole;
use Fake\ChasterObjects\Objects\Interfaces\FormattedNameInterface;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

class User implements FormattedNameInterface
{
    use ChasterIdTrait;

    /**
     * The role.
     */
    private ?ProfileRole $role = null;

    /**
     * The username.
     */
    private ?string $username = null;

    #[SerializedName('isDisabled')]
    private ?bool $disabled = null;

    #[SerializedName('isSuspended')]
    private ?bool $suspended = null;

    #[SerializedName('isNewMember')]
    private ?bool $newMember = null;

    #[SerializedName('isSuspendedOrDisabled')]
    private ?bool $suspendedOrDisabled = null;

    public ?string $avatarUrl;

    public function getRole(): ?ProfileRole
    {
        return $this->role;
    }

    /**
     * @return $this
     */
    public function setRole(ProfileRole|string|null $role): static
    {
        $this->role = !is_null($role) ? ProfileRole::normalizeToEnum($role) : null;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return $this
     */
    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function isDisabled(): bool
    {
        return $this->disabled ?? false;
    }

    public function setDisabled(?bool $disabled): void
    {
        $this->disabled = $disabled;
    }

    public function isSuspended(): bool
    {
        return $this->suspended ?? false;
    }

    public function setSuspended(?bool $suspended): void
    {
        $this->suspended = $suspended;
    }

    public function isNewMember(): bool
    {
        return $this->newMember ?? false;
    }

    public function setNewMember(?bool $newMember): void
    {
        $this->newMember = $newMember;
    }

    public function isSuspendedOrDisabled(): bool
    {
        return $this->suspendedOrDisabled ?? false;
    }

    public function setSuspendedOrDisabled(?bool $suspendedOrDisabled): void
    {
        $this->suspendedOrDisabled = $suspendedOrDisabled;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @see https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString(): string
    {
        return $this->getUsername() ?? $this->getId() ?? '';
    }

    /**
     * @example Username [User ID]
     */
    public function getFormattedName(bool $masked = false): string
    {
        return sprintf('%s [%s]', $this->getUsername() ?? '', $masked ? StringMaskRuntime::getMaskedString($this->getId()) : $this->getId());
    }

    public function getProfileUrl(): string
    {
        return 'https://chaster.app/user/'.$this->getUsername();
    }
}
