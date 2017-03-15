<?php
class SuperMarkdown extends \cebe\markdown\Markdown {
  public $html5 = false;

  /**
    * @marker |
    */
  protected function parseTerm($markdown) {
      if (preg_match('/^\|(.+?)\|/', $markdown, $matches)) {
          return [
              ['term', $this->parseInline($matches[1])],
              strlen($matches[0])
          ];
      }
      
      return [['text', '|'], 1];
  }

  protected function renderTerm($element) {
      return '<span class="term">' . $this->renderAbsy($element[1]) . '</span>';
  }

  /**
    * @marker (
    */
  protected function parseDef($markdown) {
      if (preg_match('/^\((.+?)\)/', $markdown, $matches)) {
          return [
              ['def', $this->parseInline($matches[1])],
              strlen($matches[0])
          ];
      }
      
      return [['text', '('], 1];
  }

  protected function renderDef($element) {
      return '<span class="def">(' . $this->renderAbsy($element[1]) . ')</span>';
  }

  /**
    * @marker ~
    */
  protected function parseSubscript($markdown) {
      if (preg_match('/^~(.+?)~/', $markdown, $matches)) {
          return [
              ['subscript', $this->parseInline($matches[1])],
              strlen($matches[0])
          ];
      }
      
      return [['text', '('], 1];
  }

  protected function renderSubscript($element) {
      return '<sub>' . $this->renderAbsy($element[1]) . '</sub>';
  }

  /**
    * @marker __
    */
  protected function parseUnderline($markdown) {
      if (preg_match('/^__(.+?)__/', $markdown, $matches)) {
          return [
              ['underline', $this->parseInline($matches[1])],
              strlen($matches[0])
          ];
      }
      
      return [['text', '__'], 2];
  }

  protected function renderUnderline($element) {
      return '<u>' . $this->renderAbsy($element[1]) . '</u>';
  }

  /**
    * @marker {c:
    */
  protected function parseColour($markdown) {
      if (preg_match('/^{c:([#\w]\w+)}(.*?){c}/', $markdown, $matches)) {
          return [
              ['colour', $this->parseInline($matches[2]), $matches[1]],
              strlen($matches[0])
          ];
      }
      
      return [['text', '{c:'], 3];
  }

  protected function renderColour($element) {
      return '<span style="color:' . $element[2] . '!important">' . $this->renderAbsy($element[1]) . '</span>';
  }

  protected function renderImage($block) {
		if (isset($block['refkey'])) {
			if (($ref = $this->lookupReference($block['refkey'])) !== false) {
				$block = array_merge($block, $ref);
			} else {
				return $block['orig'];
			}
		}

    $url = htmlspecialchars($block['url'], ENT_COMPAT | ENT_HTML401, 'UTF-8');

		return '<img src="' . $url . '"'
			   . ' width="' . htmlspecialchars($block['text'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE, 'UTF-8') . '"'
			   . ' style="shape-outside:url(\'' . $url . '\');"'
			   . (empty($block['title']) ? '' : ' title="' . htmlspecialchars($block['title'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE, 'UTF-8') . '"')
			   . ($this->html5 ? '>' : ' />');
	}
}
?>