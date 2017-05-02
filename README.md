# RetroTheme
Theme I made for my [site/blog](blog.retrocraft.ca).

## Cloning Instructions
1. Get git, node, and composer
2. Install gulp globally (`npm i -g gulp-cli`)
3. Install dependencies (`npm i` and `composer install`)
4. Update login credentials in `gulpfile.js`
5. Run `gulp`.
6. Select theme in WordPress.

## Study Sheets
The study sheets on the site use a customized version of Markdown. Based on GFM, there are special features for commonly used study sheet things.

| Syntax | Usage |
| --- | --- |
| `\|Term\|` | Key Terms. Renders as green and bold |
| `(side note)` | Unimportant things. Because this uses the brackets, if you want to not have italicized grey text, escape the bracket (`thing\(s\)`). Renders as grey and italic |
| `$$x^2$$` | LaTeX math. Renders as an inline math block. |
| `^sup^` | Superscript. |
| `~sub~` | Subscript. |
| `__U__` | Underline. This **does not render bold**. For emphasis, use `**`. |
| `*important words*` | Renders blue and italic. |
| `{c:#abc}color{c}` | Renders in the color `#abc`. |
