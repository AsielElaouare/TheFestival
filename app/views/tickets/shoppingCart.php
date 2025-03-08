<?php 
                $totalAmount = 0; 
                if (!empty($shoppingCart)) { ?>
                    <div class="list-group">
                        <?php foreach ($shoppingCart as $key => $item) { 
                            $itemTotal = (float)$item['price'] * (int)$item['quantity']; 
                            $totalAmount += $itemTotal;
                        ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold purple"><?= htmlspecialchars($item['eventName']) ?></span>
                                    <span><?= !empty($item['artistsName']) ? htmlspecialchars($item['artistsName']) : 'N/A' ?></span>
                                    <span>Location: <?= htmlspecialchars($item['location']) ?></span>
                                    <span>Date: <?= date("F j, Y - g:i A", strtotime($item['startDate'])) ?></span>
                                    <span>Price: €<?= number_format((float)$item['price'], 2) ?></span>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span class="badge bg-primary" style="font-size: 0.9rem;">Qty: <?= htmlspecialchars($item['quantity']) ?></span>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger text-center">Your Shopping Cart is Empty</div>
<?php } ?>