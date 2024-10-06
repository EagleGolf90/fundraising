            <div class="col-5"><label for="year_pick" class="form-label">Year</label></div>
            <div class="col-7">
              <select class="form-select form-select-lg" name="yearEntered" id="select_year_pick">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
             </div>

            <div class="col-5"><label for="select_event" class="form-label">Format</label></div>
            <div class="col-7">
              <select class="form-select form-select-lg" name="eventType" id="select_event">
                <option value="1">Super Bowl</option>
                <option value="2">NCAA March Madness - Final Four Championship Game</option>
                <option value="3">World Series - Last Final Game</option>
                <option value="4">NBA Championship Game</option>
                <option value="6">March Madness Men's NCAA Tournament - 6 Levels</option>
                <option value="7">March Madness Women's NCAA Tournament - 6 Levels</option>
              </select>
            </div>

            <div class="col-5"><label for="prize_square" class="form-label">Prize per Square</label></div>
            <div class="col-5">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="text" id="prize_square" name="prize_square" class="form-control" placeholder="Square Prize" required>
                <span class="input-group-text">.00</span>
              </div>
            </div>
            <div class="col-2">
              <span id="total_prizes">$0.00</span>
            </div>

            <div class="col-5"><label for="giveway_percentage" class="form-label">Giveway</label></div>
            <div class="col-5">
              <div class="input-group flex-nowrap">
                <input type="text" class="form-control" name="giveaway_percentage" id="giveaway_percentage" placeholder="Giveway Percentage" required>
                <span class="input-group-text" id="addon-wrapping">%</span>
              </div>
            </div>
            <div class="col-2">
              <span id="prize_giveaway">$0.00</span>
            </div>

            <div class="col-5"><label for="fundraising_percentage" class="form-label">Fundraising</label></div>
            <div class="col-5">
              <div class="input-group flex-nowrap">
                <input type="text" class="form-control" id="fundraising_percentage" name="fundraising_percentage" placeholder="Fundraising Percentage" required>
                <span class="input-group-text" id="addon-wrapping">%</span>
              </div>
            </div>
            <div class="col-2">
              <span id="prize_fundraising">$0.00</span>
            </div>

            <div class="col-5"><label for="date_from" class="form-label">Date From</label></div>
            <div class="col-3">
              <input type="date" id="date_from" name="date_from" class="form-control">
            </div>
            <div class="col-4">&nbsp;</div>

            <div class="col-5"><label for="date_to" class="form-label">Date To</label></div>
            <div class="col-3">
              <input type="date" id="date_to" name="date_to" class="form-control">
            </div>
            <div class="col-4">&nbsp;</div>

            <div class="col-5"><label for="date_to" class="form-label">Total matched Giveaway</label></div>
            <div class="col-3">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" id="grand_total" name="grand_total" class="form-control" disabled>
              </div>
            </div>
            <div class="col-4">
              <button class="w-100 btn btn-primary btn-lg" tabindex="22" id="calculate" type="button">Calculate</button>
            </div>
