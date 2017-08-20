<?php

namespace Fousky\Component\iDoklad\UrlExtension;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
class iDokladPaginator implements UrlExtensionInterface
{
    /** @var int $page */
    protected $page;

    /** @var int $pagesize */
    protected $pagesize;

    /**
     * @param int $page
     *
     * @return iDokladPaginator
     */
    public function page(int $page): iDokladPaginator
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $pagesize
     *
     * @return iDokladPaginator
     */
    public function pageSize(int $pagesize): iDokladPaginator
    {
        $this->pagesize = $pagesize;

        return $this;
    }

    /**
     * Return key => value associative array of HTTP GET parameters.
     *
     * @return array
     *
     * @internal
     */
    public function getHttpQuery(): array
    {
        $result = [];

        if (null !== $this->page) {
            $result['page'] = $this->page;
        }

        if (null !== $this->pagesize) {
            $result['pagesize'] = $this->pagesize;
        }

        return $result;
    }
}
