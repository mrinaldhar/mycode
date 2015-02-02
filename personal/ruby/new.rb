class Thing
def set_name(aName)
	@name = aName
end
def get_name
return @name
end
end


class Treasure
def initialize(aName, aDescription)
	@name = aName
	@description = aDescription
	end
def to_s
"The #{@name} treasure is #{@description}\n"
end
end

thing1 = Thing.new
thing1.set_name("A lovely thing")
puts thing1.get_name

t1 = Treasure.new("Sword", "an elvish weapon")
puts t1.to_s
puts "Inspecting #{t1.inspect}"
