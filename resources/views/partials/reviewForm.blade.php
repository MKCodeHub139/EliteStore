<h2 class="text-xl font-bold">Leave a Review</h2>
<form action="" class="my-5 reviewForm flex flex-col gap-4">
    <div class="ratings ">
            <p class="text-[13px] font-[500]">Your Rating:</p>
        <div class="flex items-center gap-2 ">
            <input type="radio" name="rating" id="star1" value="1"><label for="star1">1⭐</label>
            <input type="radio" name="rating" id="star2" value="2"`><label for="star2">2⭐</label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3">3⭐</label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4">4⭐</label>
            <input type="radio" name="rating" id="star5" value="5"><label for="star5">5⭐</label>
        </div>
    </div>
    <div class="review-title">
        <label class="text-[13px] font-[500]">Review Title:</label>
        <input type="text" name="title" id="" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-[13px]">
    </div>
    <div class="review-description">
        <label class="text-[13px] font-[500]">Your Review:</label>
        <textarea name="comment" id="" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-[13px]"></textarea>
    </div>
    {{-- ... you can add an image upload field here if you want ... --}}
     <div class="submit-btn my-3 flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg px-3 py-2 text-white text-[12px] font-bold">Submit Review</button>
     </div>
</form>