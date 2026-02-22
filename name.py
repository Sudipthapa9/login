def show_details(name, phone):
    print(f"My name is {name} and phone number is {phone}")

name = input("Enter your name: ")
phone = int(input("Enter your phone number: "))

show_details(name, phone)

def check_number(n):
    if n > 0:
        print("Positive number")
    elif n < 0:
        print("Negative number")
    else:
        print("Zero")

num = int(input("Enter a number: "))
check_number(num)
def check_number(n):
    if n > 0:
        return "Positive number"
    elif n < 0:
        return "Negative number"
    else:
        return "Zero"

num = int(input("Enter a number: "))
result = check_number(num)
print(result)
