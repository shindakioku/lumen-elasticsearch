<?php namespace Nord\Lumen\Elasticsearch\Query\TermLevel;

/**
 * Matches documents with fields that have terms within a certain range. The type of the Lucene query depends on the
 * field type, for string fields, the TermRangeQuery, while for number/date fields, the query is a NumericRangeQuery.
 *
 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-range-query.html
 */
class RangeQuery extends AbstractQuery
{
    /**
     * @var mixed Greater-than or equal to.
     */
    private $gte;

    /**
     * @var mixed Greater-than.
     */
    private $gt;

    /**
     * @var mixed Less-than or equal to.
     */
    private $lte;

    /**
     * @var mixed Less-than.
     */
    private $lt;

    /**
     * @var float Sets the boost value of the query, defaults to 1.0.
     */
    private $boost = 1.0;

    /**
     * @var string
     */
    private $field;


    /**
     * @inheritdoc
     */
    public function toArray()
    {
        $params = [];
        if (isset($this->gte)) {
            $params['gte'] = $this->gte;
        }
        if (isset($this->gt)) {
            $params['gt'] = $this->gt;
        }
        if (isset($this->lte)) {
            $params['lte'] = $this->lte;
        }
        if (isset($this->lt)) {
            $params['lt'] = $this->lt;
        }
        if (isset($this->boost)) {
            $params['boost'] = $this->boost;
        }
        return ['range' => [$this->getField() => $params]];
    }


    /**
     * @param mixed $gte
     * @return RangeQuery
     */
    public function setGreaterThanOrEquals($gte)
    {
        $this->gte = $gte;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getGreaterThanOrEquals()
    {
        return $this->gte;
    }


    /**
     * @param mixed $gt
     * @return RangeQuery
     */
    public function setGreaterThan($gt)
    {
        $this->gt = $gt;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getGreaterThan()
    {
        return $this->gt;
    }


    /**
     * @param mixed $lte
     * @return RangeQuery
     */
    public function setLessThanOrEquals($lte)
    {
        $this->lte = $lte;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getLessThanOrEquals()
    {
        return $this->lte;
    }


    /**
     * @param mixed $lt
     * @return RangeQuery
     */
    public function setLessThan($lt)
    {
        $this->lt = $lt;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getLessThan()
    {
        return $this->lt;
    }


    /**
     * @param float $boost
     * @return RangeQuery
     */
    public function setBoost($boost)
    {
        $this->boost = $boost;
        return $this;
    }


    /**
     * @return float
     */
    public function getBoost()
    {
        return $this->boost;
    }


    /**
     * @param string $field
     * @return RangeQuery
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }


    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }
}
