<?php 
                                                    function formatAddress($address, $limit = 10)
                                                    {
                                                        $words = explode(' ', $address);
                                                        $result = '';
                                                        $line = '';
                                                    
                                                        foreach ($words as $word) {
                                                            // Check if adding the word exceeds the limit
                                                            if (strlen($line . ' ' . $word) > $limit) {
                                                                $result .= trim($line) . "<br>";
                                                                $line = $word;
                                                            } else {
                                                                $line .= ' ' . $word;
                                                            }
                                                        }
                                                    
                                                        // Add the last line
                                                        $result .= trim($line);
                                                    
                                                        return $result;
                                                    }


                                                    ?>
<div class="card-body">
    <!-- Display Formatted Address -->
    <address>
        {!! formatAddress($profile->address) !!}
    </address>

    <!-- Edit Address Section -->
    @if($editing)
        <div class="mt-2">
            <label for="">Edit Address</label>
            <input class="form-control" type="text" wire:model.defer="address">
            <button class="btn-small font-weight-bold text-success mr-3 mt-2" wire:click="saveAddress">Save</button>
            <button class="btn-small font-weight-bold mt-2" wire:click="toggleEdit">Cancel</button>
        </div>
    @else
        <a href="#" class="btn-small" wire:click.prevent="toggleEdit">Edit</a>
    @endif
</div>


