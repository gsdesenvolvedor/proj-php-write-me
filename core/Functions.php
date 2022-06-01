<?php

namespace core {

    class Functions
    {
        public function breakLines(int $linesToBreak): string
        {
            return ($linesToBreak != null) ? ' ' . str_repeat('<br>', $linesToBreak) : '';
        }

        public function heading(string $value, string $breakLines, string $class): string
        {
            return match($class) {
                'h1' => '# ' . $value . $breakLines . "\r\n",
                'h2' => '## ' . $value . $breakLines . "\r\n",
                'h3' => '### ' . $value . $breakLines . "\r\n",
                'h4' => '#### ' . $value . $breakLines . "\r\n",
                'h5' => '##### ' . $value . $breakLines . "\r\n",
                'h6' => '###### ' . $value . $breakLines . "\r\n"
            };
        }

        public function bold(string $value, string $breakLines): string
        {
            return '** ' . $value . '**' . $breakLines . "\r\n";
        }

        public function italic(string $value, string $breakLines): string
        {
            return '* ' . $value . '*' . $breakLines . "\r\n";
        }

        public function blockquote(string $value, string $breakLines): string
        {
            return '> ' . $value . $breakLines . "\r\n";
        }

        public function orderedList(array $values, string $breakLines): string
        {
            $response = '';
            $i = 1;

            foreach ($values as $value)
            {
                $response .= $i . '. ' . $value . "\r\n";
                $i++;
            }

            return $response . $breakLines;
        }

        public function unorderedList(array $values, string $breakLines): string
        {
            $response = '';

            foreach ($values as $value)
            {
                $response .= '- ' . $value . "\r\n";
            }

            return $response . $breakLines;
        }

        public function code(string $value, string $breakLines): string
        {
            return '` ' . $value . ' `' . $breakLines . "\r\n";
        }

        public function horizontalRule(string $breakLines): string
        {
            return '_______________________________ ' . $breakLines . "\r\n";
        }

        public function link(array $values, string $breakLines): string
        {
            return '[' . $values[0] . '](' . $values[1] . ') ' . $breakLines . "\r\n";
        }

        public function image(string $values, string $breakLines): string
        {
            return '![' . $values[0] . '](' . $values[1] . ') ' . $breakLines . "\r\n";
        }

        public function tableHead(array $values): string
        {
            $firstLine = '| ';
            $secondLine = '|';

            foreach ($values as $value)
            {
                $firstLine .= $value . ' |';
                $secondLine .= ' ----------- |';
            }

            return $firstLine . $secondLine . "\r\n";
        }

        public function tableBody(array $lines, string $breakLines): string
        {
            $linesContent = '| ';
            $tableContent = '';

            foreach ($lines as $values)
            {
                foreach ($values as $value)
                {
                    $linesContent .= $value . ' | ';
                }

                $tableContent .= $linesContent . "\r\n";
            }

            return $tableContent . $breakLines . "\r\n";
        }

        public function fencedCodeBlock(string $value, string $breakLines): string
        {
            return '```' . $value . '```' . $breakLines . "\r\n";
        }

        public function footnote(array $values, string $breakLines): string
        {
            $response = $values[0] . '[^' . $values[1] . ']' . "\r\n";

            return $response . '[^' . $values[1] . ']: ' . $values[2] . $breakLines . "\r\n";
        }

        public function headingID(array $values, string $breakLines): string
        {
            return '### ' . $values[0] . ' {#' . $values[1] . '}' . $breakLines . "\r\n";
        }

        public function definitionList(array $values, string $breakLines): string
        {
            return $values[0] . "\r\n" . ': ' . $values[1] . $breakLines . "\r\n";
        }

        public function strikethrough(string $value, string $breakLines): string
        {
            return '~~' . $value . '~~ ' . $breakLines . "\r\n";
        }

        public function taskList(string $value, string $breakLines): string
        {
            return '';
        }

        public function emoji(string $value, string $breakLines): string
        {
            return '';
        }

        public function highlight(string $value, string $breakLines): string
        {
            return '==' . $value . '== ' . $breakLines . "\r\n";
        }

        public function subscript(string $value, string $breakLines): string
        {
            return '~' . $value . '~ ' . $breakLines . "\r\n";
        }

        public function superscript(string $value, string $breakLines): string
        {
            return '^' . $value . '^ ' . $breakLines . "\r\n";
        }
    }
}
