<?php

namespace eLife\ApiSdk\Model\Reference;

use eLife\ApiSdk\Model\AuthorEntry;
use eLife\ApiSdk\Model\Date;
use eLife\ApiSdk\Model\HasDoi;
use eLife\ApiSdk\Model\Place;
use eLife\ApiSdk\Model\Reference;

final class JournalReference implements Reference, HasDoi
{
    private $id;
    private $date;
    private $discriminator;
    private $authors;
    private $authorsEtAl;
    private $articleTitle;
    private $journal;
    private $pages;
    private $volume;
    private $doi;
    private $pmid;

    /**
     * @internal
     */
    public function __construct(
        string $id,
        Date $date,
        string $discriminator = null,
        array $authors,
        bool $authorsEtAl,
        string $articleTitle,
        Place $journal,
        ReferencePages $pages,
        string $volume = null,
        string $doi = null,
        int $pmid = null
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->discriminator = $discriminator;
        $this->authors = $authors;
        $this->authorsEtAl = $authorsEtAl;
        $this->articleTitle = $articleTitle;
        $this->journal = $journal;
        $this->pages = $pages;
        $this->volume = $volume;
        $this->doi = $doi;
        $this->pmid = $pmid;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getDate() : Date
    {
        return $this->date;
    }

    public function getDiscriminator()
    {
        return $this->discriminator;
    }

    /**
     * @return AuthorEntry[]
     */
    public function getAuthors() : array
    {
        return $this->authors;
    }

    public function authorsEtAl(): bool
    {
        return $this->authorsEtAl;
    }

    public function getArticleTitle(): string
    {
        return $this->articleTitle;
    }

    public function getJournal() : Place
    {
        return $this->journal;
    }

    public function getPages() : ReferencePages
    {
        return $this->pages;
    }

    /**
     * @return string|null
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return string|null
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * @return int|null
     */
    public function getPmid()
    {
        return $this->pmid;
    }
}
