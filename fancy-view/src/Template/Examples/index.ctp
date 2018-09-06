<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example[]|\Cake\Collection\CollectionInterface $examples
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Example'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examples index large-9 medium-8 columns content">
    <h3><?= __('Examples') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examples as $example): ?>
            <tr>
                <td><?= $this->Number->format($example->id) ?></td>
                <td><?= h($example->first_name) ?></td>
                <td><?= h($example->last_name) ?></td>
                <td><?= h($example->email) ?></td>
                <td><?= h($example->address) ?></td>
                <td><?= h($example->city) ?></td>
                <td><?= h($example->state) ?></td>
                <td><?= h($example->zip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $example->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $example->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
