import java.util.Scanner;

public class ProductSystem {

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        // Product and price arrays
        String[] products = {"Burger", "Fries", "Pizza", "Hotdog", "Soda"};
        double[] prices = {50.0, 35.0, 120.0, 40.0, 25.0};

        String correctUsername = "admin";
        String correctPassword = "1234";

        while (true) { // LOOP BACK TO START

            System.out.println("\n===== LOGIN =====");

            System.out.print("Enter Username: ");
            String username = sc.nextLine();

            System.out.print("Enter Password: ");
            String password = sc.nextLine();

            if (!username.equals(correctUsername) || !password.equals(correctPassword)) {
                System.out.println("Login Incorrect. Try Again.\n");
                continue;
            }

            System.out.println("\nLogin Successful!");

            // Display Products
            System.out.println("\n===== PRODUCT MENU =====");
            for (int i = 0; i < products.length; i++) {
                System.out.println((i + 1) + ". " + products[i] + " - PHP" + prices[i]);
            }

            int choice;

            while (true) {
                System.out.print("\nChoose Product (1-5): ");
                choice = sc.nextInt();

                if (choice >= 1 && choice <= 5) {
                    break;
                } else {
                    System.out.println("Invalid Choice! Try again.");
                }
            }

            // Input Quantity
            System.out.print("Enter Quantity: ");
            int quantity = sc.nextInt();

            // Compute Total
            double total = prices[choice - 1] * quantity;

            System.out.println("Total Amount: PHP" + total);

            // Payment
            double money;

            while (true) {
                System.out.print("Enter Payment: PHP");
                money = sc.nextDouble();

                if (money >= total) {
                    break;
                } else {
                    System.out.println("Insufficient money. Enter again.");
                }
            }

            // Change
            double change = money - total;
            

            // Print Receipt
            System.out.println("\n===== RECEIPT =====");
            System.out.println("Product: " + products[choice - 1]);
            System.out.println("Price: PHP" + prices[choice - 1]);
            System.out.println("Quantity: " + quantity);
            System.out.println("Total: PHP" + total);
            System.out.println("Payment: PHP" + money);
            System.out.println("Change: PHP" + change);
            System.out.println("===================");

            sc.nextLine(); // clear buffer

            System.out.print("\nOrder Again? (yes/no): ");
            String again = sc.nextLine();

            if (!again.equalsIgnoreCase("yes")) {
                break;
            }
        }

        System.out.println("\nThank you for ordering ;).");
        sc.close();
    }
}
