# **CSS Grid**
<br>

## **Table Of Contents**
<br>

- [**CSS Grid**](#css-grid)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
    - [**Terminology**](#terminology)
    - [**Grid Line Enumeration**](#grid-line-enumeration)
  - [**Example**](#example)
  - [**Grid Container**](#grid-container)
    - [**Define Dimensions**](#define-dimensions)
      - [**grid-template-columns**](#grid-template-columns)
      - [**grid-template-rows**](#grid-template-rows)
      - [**grid-template-areas**](#grid-template-areas)
    - [**Gaps**](#gaps)
      - [**column-gap**](#column-gap)
      - [**row-gap**](#row-gap)
      - [**gap (shorthand)**](#gap-shorthand)
    - [**Grid Alignment**](#grid-alignment)
      - [**Row Axis (justify-content)**](#row-axis-justify-content)
        - [**start**](#start)
        - [**end**](#end)
        - [**center**](#center)
        - [**space-around**](#space-around)
        - [**space-between**](#space-between)
        - [**space-evenly**](#space-evenly)
    - [**Item Alignment**](#item-alignment)
      - [**Row Axis (justify-items)**](#row-axis-justify-items)
        - [**start**](#start-1)
        - [**end**](#end-1)
        - [**center**](#center-1)
        - [**stretch**](#stretch)
      - [**Column Axis (align-items)**](#column-axis-align-items)
        - [**start**](#start-2)
        - [**end**](#end-2)
        - [**center**](#center-2)
        - [**stretch**](#stretch-1)
      - [**Shorthand (place-items)**](#shorthand-place-items)

<br>
<br>
<br>
<br>

## **General**
<br>

Grid...
* is used to align items into a two-dimensional grid layout

<br>
<br>
<br>

### **Terminology**
<br>

![Screenshot](./pictures/grid/screenshot_grid_terminology.png)

<br>
<br>
<br>

### **Grid Line Enumeration**
<br>

![Screenshot](./pictures/grid/screenshot_grid_grid_line_enumeration.png) 

<br>
<br>
<br>
<br>

## **Example**
<br>

HTML:
```html
<div class="grid-container">
    <div id="grid-item-1" class="grid-item">Grid Item 1</div>
    <div id="grid-item-2" class="grid-item">Grid Item 2</div>
    <div id="grid-item-3" class="grid-item">Grid Item 3</div>
    <div id="grid-item-4" class="grid-item">Grid Item 4</div>
</div>
```

<br>

CSS:

```css
.grid-container {
    display: grid;
    gap: 1rem;
    grid-template-columns: 100px 450px;
    grid-template-rows: 70px 200px;
}
```

```css
#grid-item-2 {
    background-color: green;
    grid-row: 2;
    grid-column: 1;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_example.png)

<br>
<br>
<br>
<br>

## **Grid Container**
<br>
<br>
<br>

### **Define Dimensions**
<br>

|Unit |Description                           |
|:----|:-------------------------------------|
|px   |pixel length                          |
|x%   |percentage of parent                  |
|fr   |fraction of available space of parent |

<br>
<br>

#### **grid-template-columns**
<br>

* defines columns of the grid via space separated list of track sizes
* allows assigning optional linenames that can be used instead of the line enumeration

<br>

```
grid-template-columns: [linename alternateLinename] 20% ...
```

<br>
<br>

```css
.grid-container {
    grid-template-columns: 200px 500px;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_template_columns.png)

<br>
<br>

#### **grid-template-rows**
<br>

* defines tows of the grid via space separated list of track sizes
* allows assigning optional linenames that can be used instead of the line enumeration

<br>

```
grid-template-rows: [linename alternateLinename] 20% ...
```

<br>
<br>

```css
.grid-container {
    grid-template-rows: 50px 150px;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_template_rows.png)

<br>
<br>

#### **grid-template-areas**
<br>

* allows to describe layout using grid area names
* allows spanning areas by repeated use of same name

<br>

|Value         |Description             |
|:-------------|:-----------------------|
|.             |empty cell              |
|\<area-name\> |cell of named grid area |

<br>

HTML

```html
<div class="grid-container">
    <div id="grid-item-1">Header</div>
    <div id="grid-item-2">Content</div>
    <div id="grid-item-3">Sidebar</div>
    <div id="grid-item-4">Footer</div>
</div>
```

<br>

CSS

```css
.grid-container {
    display: grid;
    grid-template-areas: 
        "header header header"
        "content . sidebar"
        "content footer footer";
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_template_areas.png)

<br>
<br>
<br>

### **Gaps**
<br>
<br>

#### **column-gap**
<br>

```css
.grid-container {
    column-gap: 20px;
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_column_gap.png)

<br>
<br>

#### **row-gap**
<br>

```css
.grid-container {
    row-gap: 20px;
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_row_gap.png)

<br>
<br>

#### **gap (shorthand)**
<br>

* shorthand for [column-gap](#column-gap) and [row-gap](#row-gap)

<br>

```css
.grid-container {
    gap: 20px;
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_gap.png)

<br>
<br>
<br>

### **Grid Alignment**
<br>
<br>

#### **Row Axis (justify-content)**
<br>

* horizontally aligns entire grid if combined width of grid items is less than width of grid container

<br>
<br>

##### **start**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: start;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_start.png)

<br>
<br>

##### **end**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: end;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_end.png)

<br>
<br>

##### **center**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: center;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_center.png)

<br>
<br>

##### **space-around**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: space-around;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_space_around.png)

<br>
<br>

##### **space-between**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: space-between;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_space_between.png)

<br>
<br>

##### **space-evenly**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 150px);
    justify-content: space-evenly;
}
```

<br>

![Screenshot](pictures/grid/screenshot_grid_justify_content_space_evenly.png)


























<br>
<br>
<br>

### **Item Alignment**
<br>
<br>

#### **Row Axis (justify-items)**
<br>

* aligns items along row axis
* default: stretch

<br>
<br>

##### **start**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    justify-items: start;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_justify_items_start.png)

<br>
<br>

##### **end**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    justify-items: end;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_justify_items_end.png)

<br>
<br>

##### **center**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    justify-items: center;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_justify_items_center.png)

<br>
<br>

##### **stretch**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    justify-items: stretch;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_justify_items_stretch.png)

<br>
<br>

#### **Column Axis (align-items)**
<br>

* aligns items along column axis
* default: stretch

<br>
<br>

##### **start**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: start;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_align_items_start.png)

<br>
<br>

##### **end**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: end;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_align_items_end.png)

<br>
<br>

##### **center**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_align_items_center.png)

<br>
<br>

##### **stretch**
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: stretch;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_align_items_stretch.png)

<br>
<br>

#### **Shorthand (place-items)**
<br>

* shorthand for [align-items](#column-axis-align-items) and [justify-items](#row-axis-justify-items)

<br>
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    place-items: start end;
}
```

equals 

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: start;
    justify-items: end;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_place_items_example_1.png)

<br>
<br>

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    place-items: center;
}
```

equals 

```css
.grid-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
    justify-items: center;
}
```

<br>

![Screenshot](./pictures/grid/screenshot_grid_place_items_example_2.png)