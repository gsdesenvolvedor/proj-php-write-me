<?php
namespace core {

    require_once 'Functions.php';

    class WriteMe extends Functions
    {
        private array $originalSetKits;
        private array $formattedSetKits;

        public function set(string $tag, array $value, int $linesToBreak = 0): void
        {
            $this->originalSetKits[] = [$tag, $value, $linesToBreak];
        }

        public function generate(string $path): void
        {
            foreach ($this->originalSetKits as $vars)
            {
                $this->formattedSetKits[] = match ($vars[0])
                {
                    'heading'         => $this->heading($vars[1][0], $this->breakLines($vars[2]), $vars[1][1]),
                    'bold'            => $this->bold($vars[1][0], $this->breakLines($vars[2])),
                    'italic'          => $this->italic($vars[1][0], $this->breakLines($vars[2])),
                    'blockquote'      => $this->blockquote($vars[1][0], $this->breakLines($vars[2])),
                    'orderedList'     => $this->orderedList($vars[1], $this->breakLines($vars[2])),
                    'unorderedList'   => $this->unorderedList($vars[1][0], $this->breakLines($vars[2])),
                    'code'            => $this->code($vars[1][0], $this->breakLines($vars[2])),
                    'horizontalRule'  => $this->horizontalRule($this->breakLines($vars[2])),
                    'link'            => $this->link($vars[1][0], $this->breakLines($vars[2])),
                    'image'           => $this->image($vars[1][0], $this->breakLines($vars[2])),
                    'tableHead'       => $this->tableHead($vars[1][0]),
                    'tableBody'       => $this->tableBody($vars[1][0], $this->breakLines($vars[2])),
                    'fencedCodeBlock' => $this->fencedCodeBlock($vars[1][0], $this->breakLines($vars[2])),
                    'footnote'        => $this->footnote($vars[1][0], $this->breakLines($vars[2])),
                    'headingID'       => $this->headingID($vars[1][0], $this->breakLines($vars[2])),
                    'definitionList'  => $this->definitionList($vars[1][0], $this->breakLines($vars[2])),
                    'strikethrough'   => $this->strikethrough($vars[1][0], $this->breakLines($vars[2])),
                    'taskList'        => $this->taskList($vars[1][0], $this->breakLines($vars[2])),
                    'emoji'           => $this->emoji($vars[1][0], $this->breakLines($vars[2])),
                    'highlight'       => $this->highlight($vars[1][0], $this->breakLines($vars[2])),
                    'subscript'       => $this->subscript($vars[1][0], $this->breakLines($vars[2])),
                    'superscript'     => $this->superscript($vars[1][0], $this->breakLines($vars[2]))
                };
            }

            file_put_contents($path, $this->formattedSetKits);
        }
    }
}
