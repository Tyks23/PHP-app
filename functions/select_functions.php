<?php

function buildHierarchy($array, $parent_id = null)
{
    $result = array();

    foreach ($array as $sector) {
        if ($sector['parent_sector_id'] === $parent_id) {
            $children = buildHierarchy($array, $sector['sector_id']);
            if (!empty($children)) {
                $sector['children'] = $children;
            }
            $result[] = $sector;
        }
    }

    usort($result, function ($a, $b) {
        return strcasecmp($a['sector_name'], $b['sector_name']);
    });

    return $result;
}

function generateSelectOptions($array, $selectedSectors, $indentation = '')
{
    $options = '';

    foreach ($array as $sector) {
        $value = $sector['sector_id'];
        $label = $indentation . $sector['sector_name'];
        $checked = in_array($value, $selectedSectors);
        $options .= '<option value="' . $value . '"' . ($checked ? 'selected' : '') . '>' . $label . '</option>';

        if (isset($sector['children'])) {
            $childIndentation = $indentation . '&nbsp;&nbsp;&nbsp;&nbsp;';
            $options .= generateSelectOptions($sector['children'], $selectedSectors, $childIndentation);
        }
    }

    return $options;
}

require_once "db/db_connection.php";

$query = 'SELECT * FROM sectors ORDER BY sector_id';
$stmt = $db->query($query);
$sectors = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>