<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <style>
        .category-item {
            margin-left: 20px;
            cursor: pointer;
        }

        .subcategory-list {
            display: none;
            list-style-type: none;
            margin-left: 20px;
            padding-left: 0;
        }

        .subcategory-list li {
            position: relative;
        }

        .subcategory-list li:before {
            content: "";
            position: absolute;
            left: -10px;
            top: 5px;
            border-left: 1px solid #ccc;
            height: 100%;
        }
    </style>
</head>
<body>
<ul id="category-tree">
    @foreach ($categories as $category)
        <li>
            <span class="category-item"  onclick="loadSubCategories({{ $category->id }}, this)" data-category-id="{{ $category->id }}">{{ $category->name }}</span>
            <ul class="subcategory-list">
                <li class="category-item"></li> <!-- Placeholder for subcategories -->
            </ul>
        </li>
    @endforeach
</ul>

<script>
    function getSubcategories(categoryId, subcategoryList) {
        fetch('/categories/' + categoryId + '/sub')
            .then(response => response.json())
            .then(subcategories => {
                buildSubcategoryTree(subcategories, subcategoryList);
                subcategoryList.style.display = 'block';
            })
            .catch(error => {
                console.log('Failed to load subcategories.', error);
            });
    }

    function buildSubcategoryTree(subcategories, subcategoryList) {
        subcategories.forEach(subcategory => {
            const subcategoryItem = document.createElement('li');
            subcategoryItem.innerHTML = `<span class="category-item" onclick="loadSubCategories(${subcategory.id}, this)" data-category-id="${subcategory.id}">${subcategory.name}</span><ul class="subcategory-list"><li class="category-item"></li></ul>`;
            subcategoryList.appendChild(subcategoryItem);
        });
    }

    function loadSubCategories(categoryId, element) {
        const subcategoryList = element.nextElementSibling;

        if (subcategoryList.children.length > 1) {
            subcategoryList.style.display = subcategoryList.style.display === 'none' ? 'block' : 'none';
        } else {
            getSubcategories(categoryId, subcategoryList);
        }
    }
</script>
</body>
</html>
