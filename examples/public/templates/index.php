<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Paysafe – Merchant Payment Demo</title>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>

<header>
    <div class="logo">Paysafe <span>SDK</span></div>
    <div class="badge">Merchant Demo</div>
</header>

<div class="page">

    <!-- Alerts -->
    <?php if ($successMessage): ?>
        <div class="alert alert-success">
            <span class="alert-icon">✅</span>
            <span><?= htmlspecialchars($successMessage) ?></span>
        </div>
    <?php endif; ?>
    <?php if ($errorMessage): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠️</span>
            <pre><?= htmlspecialchars($errorMessage) ?></pre>
        </div>
    <?php endif; ?>

    <div class="grid">

        <!-- Checkout form -->
        <div class="card">
            <div class="card-header"><span class="icon">💳</span> New Payment</div>
            <div class="card-body">
                <form action="/checkout" method="post">

                    <input type="hidden" id="paymentMethodBackendValue" value="<?= htmlspecialchars($form['paymentMethod']) ?>"/>

                    <p class="section-label">Payment Method</p>
                    <div class="form-group">
                        <label for="paymentMethod">Select Method</label>
                        <select id="paymentMethod" name="paymentMethod">
                            <option value="CARD" <?= $form['paymentMethod'] === 'CARD' ? 'selected' : '' ?>>Card</option>
                            <option value="PAYSAFECARD" <?= $form['paymentMethod'] === 'PAYSAFECARD' ? 'selected' : '' ?>>PaysafeCard</option>
                            <option value="PAYSAFECASH" <?= $form['paymentMethod'] === 'PAYSAFECASH' ? 'selected' : '' ?>>PaysafeCash</option>
                            <option value="PAYPAL" <?= $form['paymentMethod'] === 'PAYPAL' ? 'selected' : '' ?>>PayPal</option>
                            <option value="SKRILL" <?= $form['paymentMethod'] === 'SKRILL' ? 'selected' : '' ?>>Skrill</option>
                        </select>
                    </div>

                    <hr class="divider"/>

                    <div id="cardFields">
                        <p class="section-label">Card Details</p>
                        <div class="form-group">
                            <label for="holderName">Cardholder Name</label>
                            <input id="holderName" name="holderName" type="text" placeholder="John Smith" value="<?= htmlspecialchars($form['holderName']) ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="cardNum">Card Number</label>
                            <input id="cardNum" name="cardNum" type="text" placeholder="Card number" maxlength="19" value="<?= htmlspecialchars($form['cardNum']) ?>"/>
                        </div>
                        <div class="row row-2 form-group">
                            <div>
                                <label for="expiry">Expiry (MM/YY)</label>
                                <input id="expiry" name="expiry" type="text" maxlength="5" placeholder="MM/YY" value="<?= htmlspecialchars($form['expiry']) ?>"/>
                            </div>
                            <div>
                                <label for="cvv">CVV</label>
                                <input id="cvv" name="cvv" type="text" maxlength="4" placeholder="123" value="<?= htmlspecialchars($form['cvv']) ?>"/>
                            </div>
                        </div>
                    </div>

                    <div id="paypalFields">
                        <p class="section-label">PayPal Details</p>
                        <div class="form-group">
                            <label for="paypalEmail">Your PayPal Account Email</label>
                            <input id="paypalEmail" name="paypalEmail" type="text" placeholder="JohnSmith@example.com" value="<?= htmlspecialchars($form['paypalEmail']) ?>"/>
                        </div>
                    </div>

                    <div id="skrillFields">
                        <p class="section-label">Skrill Details</p>
                        <div class="form-group">
                            <label for="skrillId">Your Skrill Account ID</label>
                            <input id="skrillId" name="skrillId" type="text" placeholder="your_skrill_id" value="<?= htmlspecialchars($form['skrillId']) ?>"/>
                        </div>
                    </div>

                    <hr class="divider"/>
                    <p class="section-label">Order Details</p>
                    <div class="form-group">
                        <label for="amount">Amount (USD)</label>
                            <input id="amount" name="amount" type="text"
                                   placeholder="10.00"
                                   pattern="^\d+(\.\d{1,2})?$"
                                   title="Enter a valid amount with up to 2 decimal places (e.g. 10.00)"
                                   required
                                   value="<?= htmlspecialchars($form['amount']) ?>"/>
                   </div>

                    <hr class="divider"/>
                    <p class="section-label">Billing Address</p>
                    <div class="form-group">
                        <label for="street">Address Line 1</label>
                        <input id="street" name="street" type="text" placeholder="123 Main St" required value="<?= htmlspecialchars($form['street']) ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="street2">
                            Address Line 2 <span id="address2OptLabel"></span>
                        </label>
                        <input id="street2" name="street2" type="text" placeholder="Apt, suite, unit" value="<?= htmlspecialchars($form['street2']) ?>"/>
                    </div>
                    <div class="row row-2 form-group">
                        <div>
                            <label for="city">City</label>
                            <input id="city" name="city" type="text" placeholder="London" required value="<?= htmlspecialchars($form['city']) ?>"/>
                        </div>
                        <div>
                            <label for="zip">Postal Code</label>
                            <input id="zip" name="zip" type="text" required value="<?= htmlspecialchars($form['zip']) ?>"/>
                        </div>
                    </div>
                    <div class="row row-2 form-group">
                        <div>
                            <label for="state">State / Province <span class="label-optional">(opt.)</span></label>
                            <input id="state" name="state" type="text" value="<?= htmlspecialchars($form['state']) ?>"/>
                        </div>
                        <div>
                            <label for="country">Country <span class="label-optional">(ISO 2-letter)</span></label>
                            <input id="country" name="country" type="text" maxlength="2" required value="<?= htmlspecialchars($form['country']) ?>"/>
                        </div>
                    </div>

                    <button type="submit" class="btn-pay">Pay now</button>
                </form>

                <div id="testCardsHint" class="hint-box">
                    <strong>Test Cards</strong>
                    <div style="margin-bottom: 6px;">Click a card number to autofill:</div>
                    <div class="hint-row"><span>3DS No Challenge + Success</span> <code onclick="document.getElementById('cardNum').value=this.textContent">4000000000002719</code></div>
                    <div class="hint-row"><span>3DS Challenge + Success</span>    <code onclick="document.getElementById('cardNum').value=this.textContent">4000000000002503</code></div>
                    <div class="hint-row"><span>3DS Rejected</span>               <code onclick="document.getElementById('cardNum').value=this.textContent">4000000000002537</code></div>
                    <div class="hint-row"><span>3DS Error</span>                  <code onclick="document.getElementById('cardNum').value=this.textContent">4000000000002446</code></div>
                </div>
            </div>
        </div>

        <!-- Transaction list -->
        <div class="card">
            <div class="card-header"><span class="icon">📋</span> Transactions</div>
            <div class="card-body" style="padding:0">

                <?php if (empty($transactions)): ?>
                    <div class="empty-state">
                        <div class="empty-icon">🧾</div>
                        <p>No transactions yet.<br/>Submit a payment on the left to get started.</p>
                    </div>
                <?php else: ?>
                    <div class="table-wrap">
                        <table>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment Type</th>
                                <th>Paysafe ID</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($transactions as $tx): ?>
                                <tr>
                                    <td class="mono"><?= htmlspecialchars($tx['createdAt']) ?></td>
                                    <td><?= htmlspecialchars(\Paysafe\MerchantDemo\DemoService::formatAmount($tx)) ?></td>
                                    <td>
                                        <span class="status-badge status-<?= htmlspecialchars($tx['status']) ?>">
                                            <?= htmlspecialchars($tx['status']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars(\Paysafe\MerchantDemo\DemoService::paymentMethodLabel($tx['paymentMethod'])) ?></td>
                                    <td class="mono"><?= htmlspecialchars($tx['paymentId']) ?></td>
                                    <td>
                                        <div class="actions">
                                            <?php if ($tx['status'] === 'PENDING_SETTLEMENT' && $tx['paymentMethod'] === 'CARD'): ?>
                                                <form action="/void/<?= htmlspecialchars($tx['id']) ?>" method="post" style="display:inline">
                                                    <button class="btn-action btn-settle" type="submit" onclick="return confirm('Void this transaction?')">Void</button>
                                                </form>
                                                <form action="/settle/<?= htmlspecialchars($tx['id']) ?>" method="post" style="display:inline">
                                                    <button class="btn-action btn-settle" type="submit" onclick="return confirm('Settle this transaction?')">Settle</button>
                                                </form>
                                            <?php endif; ?>

                                            <?php if ($tx['status'] === 'SETTLED' && $tx['paymentMethod'] === 'CARD'): ?>
                                                <form action="/cancel/<?= htmlspecialchars($tx['id']) ?>" method="post" style="display:inline">
                                                    <button class="btn-action btn-cancel" type="submit" onclick="return confirm('Cancel settlement?')">Cancel</button>
                                                </form>
                                                <form action="/refund/<?= htmlspecialchars($tx['id']) ?>" method="post" style="display:inline">
                                                    <button class="btn-action btn-refund" type="submit" onclick="return confirm('Refund this transaction?')">Refund</button>
                                                </form>
                                            <?php endif; ?>

                                            <?php if ($tx['status'] === 'SETTLED' && in_array($tx['paymentMethod'], ['PAYPAL', 'SKRILL'])): ?>
                                                <form action="/refund/<?= htmlspecialchars($tx['id']) ?>" method="post" style="display:inline">
                                                    <button class="btn-action btn-refund" type="submit" onclick="return confirm('Refund this transaction?')">Refund</button>
                                                </form>
                                            <?php endif; ?>

                                            <?php if ($tx['status'] === 'SETTLED' && in_array($tx['paymentMethod'], ['PAYSAFECARD', 'PAYSAFECASH'])): ?>
                                                <button class="btn-action btn-refund" type="button"
                                                        onclick="openRefundModal('<?= htmlspecialchars($tx['id']) ?>', '<?= htmlspecialchars($tx['paymentMethod']) ?>')">Refund</button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<!-- Refund modal (PaysafeCard / PaysafeCash) -->
<div id="refundModal" class="modal-overlay">
    <div class="modal-box">
        <h3 id="refundModalTitle">Refund</h3>
        <p id="refundModalMessage"></p>
        <form id="refundModalForm" method="post">
            <div class="form-group">
                <label for="customerAccountId">Registered email</label>
                <input type="text" id="customerAccountId" name="customerAccountId" required/>
            </div>
            <div class="modal-buttons">
                <button type="button" class="btn-modal-cancel" onclick="closeRefundModal()">Cancel</button>
                <button type="submit" class="btn-action btn-refund">Confirm Refund</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>
