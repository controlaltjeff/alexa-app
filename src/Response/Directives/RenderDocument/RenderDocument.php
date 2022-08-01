<?php

namespace Develpr\AlexaApp\Response\Directives\RenderDocument;

use Develpr\AlexaApp\Response\Directives\Directive;
use Illuminate\Support\Str;

class RenderDocument extends Directive
{
    protected $document;
    protected $datasources;
    protected $type;

    public function __construct($document = null, $datasources = null, $type = 'Alexa.Presentation.APL.RenderDocument')
    {
        $this->document = $document;
        $this->datasources = $datasources;
        $this->type = $type;
    }

    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type,
            'token' => Str::random(),
            'document' => $this->document instanceof Document ? $this->document->toArray() : Document::fromJson($this->document),
            'datasources' => $this->datasources
        ];
    }

}
