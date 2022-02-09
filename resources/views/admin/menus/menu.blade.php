<div class="d-block" id="MENU_DRAWER">
    <?php

    function itemActions($data, $itemsEditPanels)
    {
        return $itemsEditPanels[$data['id']];
        return '




                <div>
                    <a href="' . route('menu_items.edit', ['menu' => $data['menu'], 'menu_item' => $data['id']]) . '" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i> ویرایش
                    </a>
                    <form action="' . route('menu_items.destroy', ['menu' => $data['menu'], 'menu_item' => $data['id']]) . '" class="d-inline" method="POST" onsubmit="confirmDelete(event, this);">' . csrf_field() . method_field('DELETE') . '
                        <button class="btn btn-danger btn-sm"><i class="fal fa-fw fa-times-circle"></i>حذف</button>
                    </form>
                </div>';
    }

    function loadMenu($chartArray, $index, $itemsEditPanels)
    {
        $i = 0;
        $chart = [];
        foreach ($chartArray as $unit) {
            $chart['chart'][$unit['id']] = $unit;
            $chart['parent_nodes'][$unit['parent']][] = $unit['id'];
        }

        function get_recursive_chart($parentNode, $chart, $itemsEditPanels)
        {
            global $i;
            $i++;
            $html = "";
            if (isset($chart['parent_nodes'][$parentNode])) {
                $html .= '<ol data-id="' . $parentNode . '" class="collection ' . ($i == 1 ? 'sortable' : '') . '">' . PHP_EOL;

                foreach ($chart['parent_nodes'][$parentNode] as $unitId) {
                    if (!isset($chart['parent_nodes'][$unitId])) {
                        $html .= '<li data-id="' . $unitId . '" class="item">
                                        <div class="item-wrapper">
                                            <div class="r-child">
                                                <span class="title">' . $chart['chart'][$unitId]['label'] . '</span>
                                            </div>
                                            <div class="l-child"><button class="btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#COLLAPSE_ITEM_' . $unitId . '" aria-expanded="false" aria-controls="COLLAPSE_ITEM_' . $unitId . '"><i class="fa fa-chevron-circle-down"></i></button></div>
                                        </div>
                                        <div class="collapse card" style="border-radius: unset;border-top: unset;" id="COLLAPSE_ITEM_' . $unitId . '">
                                               <div class="card-body">' . itemActions($chart['chart'][$unitId], $itemsEditPanels) . '</div>
                                        </div>
                                    <ol data-id="' . $unitId . '" class="collection"></ol>
                                  </li>' . PHP_EOL;
                    }

                    if (isset($chart['parent_nodes'][$unitId])) {
                        $html .= '<li data-id="' . $unitId . '" class="item">
                                    <div class="item-wrapper">
                                        <div class="r-child">
                                            <span class="title">' . $chart['chart'][$unitId]['label'] . '</span>
                                        </div>
                                        <div class="l-child">
                                            <button class="btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#COLLAPSE_ITEM_' . $unitId . '" aria-expanded="false" aria-controls="COLLAPSE_ITEM_' . $unitId . '"><i class="fa fa-chevron-circle-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="collapse card" style="border-radius: unset;border-top: unset;" id="COLLAPSE_ITEM_' . $unitId . '">
                                       <div class="card-body">' . itemActions($chart['chart'][$unitId], $itemsEditPanels) . '</div>
                                    </div>' . PHP_EOL;
                        $html .= get_recursive_chart($unitId, $chart, $itemsEditPanels);
                        $html .= "</li> " . PHP_EOL;
                    }
                }
                $html .= "</ol> " . PHP_EOL;
            }
            return $html;
        }

        return get_recursive_chart($index, $chart, $itemsEditPanels);
    }

    ?>
    <ol class="collection">
        <li data-id="1" class="item">
            @php
                $ms = $menu->items->toArray();
                if (is_null($first = \App\Models\MenuItem::find(1))) {
                    $first = \App\Models\MenuItem::generateRoot();
                }
                $ms[] = $first->toArray();
            @endphp
            {!! loadMenu($ms, 1,$itemsEditPanels) !!}
        </li>
    </ol>

</div>
