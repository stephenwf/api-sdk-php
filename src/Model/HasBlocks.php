<?php

namespace eLife\ApiSdk\Model;

use eLife\ApiSdk\Model\Block\Image as ImageBlock;
use eLife\ApiSdk\Model\Block\Paragraph;
use eLife\ApiSdk\Model\Block\YouTube;
use UnexpectedValueException;

trait HasBlocks
{
    /**
     * @return Block[]
     */
    final private function denormalizeBlocks(array $blocks) : array
    {
        $return = [];

        foreach ($blocks as $block) {
            $return[] = static::denormalizeBlock($block);
        }

        return $return;
    }

    final private function denormalizeBlock(array $block) : Block
    {
        switch ($type = $block['type'] ?? 'unknown') {
            case 'image':
                return new ImageBlock($block['uri'], $block['alt'], $block['caption'] ?? null);
            case 'paragraph':
                return new Paragraph($block['text']);
            case 'youtube':
                return new YouTube($block['id'], $block['width'], $block['height']);
        }

        throw new UnexpectedValueException('Unknown block type '.$type);
    }
}
