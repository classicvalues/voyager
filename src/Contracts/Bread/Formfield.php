<?php

namespace TCG\Voyager\Contracts\Bread;

abstract class Formfield implements \JsonSerializable
{
    /**
     * Get the name of the formfield.
     *
     * @return string|array
     */
    abstract public function name();

    /**
     * Get the type of the formfield.
     *
     * @return string
     */
    abstract public function type(): string;

    /**
     * Get the (custom) options for a list.
     *
     * @return array
     */
    abstract public function listOptions(): array;

    /**
     * Get the (custom) options for a view.
     *
     * @return array
     */
    abstract public function viewOptions(): array;

    /**
     * Gets if the formfield is translatable.
     *
     * @return bool
     */
    abstract public function translatable(): bool;

    /**
     * Get the data for browsing.
     *
     * @param mixed $input
     * @return mixed
     */
    abstract public function browse($input);

    /**
     * Get the data for reading.
     *
     * @param mixed $input
     * @return mixed
     */
    abstract public function read($input);

    /**
     * Get the data for editing.
     *
     * @param mixed $input
     * @return mixed
     */
    abstract public function edit($input);

    /**
     * Get the data for updating (after editing).
     *
     * @param mixed $input
     * @param mixed $old
     * @return mixed
     */
    abstract public function update($input, $old);

    /**
     * Get the data for adding (eg. default values).
     *
     * @return mixed
     */
    abstract public function add();

    /**
     * Get the data for storing (after adding).
     *
     * @param mixed $input
     * @return mixed
     */
    abstract public function store($input);

    public function jsonSerialize()
    {
        return [
            'name'        => $this->name(),
            'type'        => $this->type(),
            'listOptions' => (object) $this->listOptions(),
            'viewOptions' => (object) $this->viewOptions(),
        ];
    }
}