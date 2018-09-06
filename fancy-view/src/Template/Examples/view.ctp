<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example $example
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Example'), ['action' => 'edit', $example->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Example'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examples'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Example'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examples view large-9 medium-8 columns content">
    <h3><?= h($example->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($example->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($example->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($example->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($example->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($example->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($example->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($example->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($example->id) ?></td>
        </tr>
    </table>
</div>
