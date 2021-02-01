<div class="suspects view large-9 medium-8 columns content">
    
    <h3><?= h($suspect->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($suspect->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($suspect->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicule') ?></th>
            <td><?= $suspect->vehicule->id ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($suspect->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($suspect->comments)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
            </tr>
            <?php foreach ($suspect->comments as $comments): ?>
            <tr>
                <td><?= h($comments->address) ?></td>
                <td><?= h($comments->message) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Crimes') ?></h4>
        <?php if (!empty($suspect->crimes)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
            </tr>
            <?php foreach ($suspect->crimes as $crimes): ?>
            <tr>
                <td><?= h($crimes->id) ?></td>
                <td><?= h($crimes->description) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($suspect->events)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Description') ?></th>
            </tr>
            <?php foreach ($suspect->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->date) ?></td>
                <td><?= h($events->description) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
