# **Visual Studio Code**
<br>

## **Table Of Contents**
<br>

- [**Visual Studio Code**](#visual-studio-code)
  - [**Table Of Contents**](#table-of-contents)
  - [**Recommended Settings**](#recommended-settings)
  - [**Shortcuts**](#shortcuts)
    - [**Basic Window Shortcuts**](#basic-window-shortcuts)
    - [**Files**](#files)
      - [**Basic Operations**](#basic-operations)
      - [**Navigation**](#navigation)
      - [**Line Manipulation**](#line-manipulation)
      - [**Text**](#text)
      - [**Multiline Cursor**](#multiline-cursor)
      - [**Refactoring**](#refactoring)
      - [**Markdown**](#markdown)
  - [**HTML Editing With Emmet**](#html-editing-with-emmet)

<br>
<br>
<br>

## **Recommended Settings**

| Setting                                     | Description                                        |
| :------------------------------------------ | :------------------------------------------------- |
| `workbench.settings.editor: 'json'`         | shows settings as json file                        |
| `workbench.sidebar.location: 'right'`       | positions the sidebar to the right                 |
| `editor.minimap.enabled: false`             | hides code minimap                                 |
| `js/ts.implicitProjectConfig.checkJS: true` | enables TypeScript type check for JavaScript files |

<br>
<br>
<br>

## **Shortcuts**
<br>
<br>

### **Basic Window Shortcuts**

| Shortcut Linux            | Shortcut Mac              | Description          |
| :------------------------ | :------------------------ | :------------------- |
| `Ctrl + E`                | `Cmd + E`                 | open file explorer   |
| `Ctrl + P`                | `Cmd + P`                 | open file switcher   |
| `Ctrl + Shift + P`        | `Cmd + Shift + P`         | open command palette |
| `Ctrl + B`                | `Cmd + B`                 | toggle sidebar       |
| `Ctrl + ,`                | `Cmd + ,`                 | open settings        |
| `Ctrl + Shift + Backtick` | `Ctrl + Shift + Backtick` | toggle terminal      |
| `Ctrl + Q`                | `Cmd + Q`                 | exit VsCode          |

<br>
<br>

### **Files**
<br>

#### **Basic Operations**

| Shortcut Linux | Shortcut Mac | Description                  |
| :------------- | :----------- | :--------------------------- |
| `Ctrl + O`     | `Cmd + O`    | open file                    |
| `Ctrl + N`     | `Cmd + N`    | create new file              |
| `Ctrl + S`     | `Cmd + S`    | save changes of current file |
| `Ctrl + W`     | `Cmd + W`    | close current file           |

<br>
<br>

#### **Navigation**

| Shortcut Linux | Shortcut Mac  | Description                                              |
| :------------- | :------------ | :------------------------------------------------------- |
| `Ctrl + P`     | `Cmd + P`     | open file switcher (`@:` shows elements of current file) |
| `Ctrl + P + P` | `Cmd + P + P` | open the previous file                                   |
| `Ctrl + 0`     | `Cmd + 0`     | move to the sidebar                                      |
| `Ctrl + Enter` | `Cmd + Down`  | open the selected file from the sidebar                  |
| `Ctrl + 1`     | `Cmd + 1`     | move to the editor                                       |
| `Ctrl + g`     | `Cmd + g`     | move to the specified line number                        |
| `Ctrl + u`     | `Cmd + u`     | move to the previous cursor position                     |
| `Ctrl + Up`    | `Cmd + Up`    | move to the beginning of the file                        |
| `Ctrl + Down`  | `Cmd + Down`  | move to the end of the file                              |
| `Ctrl + Left`  | `Alt + Left`  | move after previous word                                 |
| `Ctrl + Right` | `Alt + Right` | move after current word                                  |
| `F12`          | `F12`         | move to definition of selected element                   |

<br>
<br>

#### **Line Manipulation**

| Shortcut Linux       | Shortcut Mac      | Description                                 |
| :------------------- | :---------------- | :------------------------------------------ |
| `Ctrl + X`           | `Cmd + X`         | cut current line that the **cursor** is at  |
| `Ctrl + C`           | `Cmd + C`         | copy current line that the **cursor** is at |
| `Alt + Shift + Plus` | `Alt + Shift + C` | copy current line beneath it                |
| `Ctrl + V`           | `Cmd + V`         | paste copied line                           |
| `Ctrl + Shift + K`   | `Cmd + Shift + K` | delete current line                         |
| `Alt + Up`           | `Alt + Up`        | move current line upward                    |
| `Alt + Down`         | `Alt + Down`      | move current line downward                  |
| `Ctrl + K Ctrl + C`  | `Cmd + K Cmd + C` | comment out current line                    |
| `Ctrl + K Ctrl + U`  | `Cmd + K Cmd + U` | remove comment from current line            |
| `Ctrl + L`           | `Cmd + L`         | select current line                         |

<br>
<br>

#### **Text**

| Shortcut Linux         | Shortcut Mac          | Description                       |
| :--------------------- | :-------------------- | :-------------------------------- |
| `Ctrl + Backspace`     | `Cmd + Backspace`     | delete previous word              |
| `Ctrl + Shift + Left`  | `Cmd + Shift + Left`  | select previous word              |
| `Ctrl + Shift + Right` | `Cmd + Shift + Right` | select next word                  |
| `Ctrl + Shift + 7`     | `Cmd + Shift + 7`     | toggle selected lines as comments |

<br>
<br>

#### **Multiline Cursor**

| Shortcut Linux       | Shortcut Mac         | Description                                      |
| :------------------- | :------------------- | :----------------------------------------------- |
| `Ctrl + Shift + L`   | `Cmd + Shift + L`    | add cursor for all instances of selected element |
| `Ctrl + D`           | `Cmd + D`            | add cursor th the next match of selected element |
| `Ctrl + D + K`       | `Cmd + D + K`        | skip next match of selected element              |
| `Alt + Shift + Up`   | `Alt + Shift + Up`   | add cursor to line above                         |
| `Alt + Shift + Down` | `Alt + Shift + Down` | add cursor to line beneath                       |
| `Alt + Enter`        | `Alt + Enter`        | add cursor for all matches of a search           |

<br>
<br>

#### **Refactoring**

| Shortcut Linux | Shortcut Mac  | Description                             |
| :------------- | :------------ | :-------------------------------------- |
| `F2`           | `F2`          | rename selected element                 |
| `Ctrl + .`     | `Cmd + .`     | open refactor menu for selected element |
| `Ctrl + Space` | `Cmd + Space` | open IntelliSense                       |

<br>
<br>

#### **Markdown**

| Shortcut Linux     | Shortcut Mac       | Description                            |
| :----------------- | :----------------- | :------------------------------------- |
| `Ctrl + Shift + V` | `Ctrl + Shift + V` | Open preview for current markdown file |


<br>
<br>
<br>

## **HTML Editing With Emmet**

| Input      | Rendered Element           |
| :--------- | :------------------------- |
| `div`      | `<div></div>`              |
| `div#test` | `<div id="test"></div>`    |
| `div.test` | `<div class="test"></div>` |
| `div*2`    | `<div></div><div></div>`   |
| `div>h2`   | `<div><h2></h2></div>`     |

<br>

| Command                         |    Manual Shortcut    | Description                            |
| :------------------------------ | :-------------------: | :------------------------------------- |
| `Emmet: Balance Outward`        |  `Ctrl + Shift + Up`  | expand current selection to whole tag  |
| `Emmet: Wrap With Abbreviation` | `Ctrl + Shift + Left` | wrap current element in new tag        |
| `Emmet: Update Tag Name`        |           -           | rename tag name                        |
| `Emmet: Update Image Size`      |           -           | add image size properties to image tag |